<?php

defined('DS') or exit('No direct access.');

class Admin_Media_Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('before', 'csrf|throttle:60,1');
    }

    public function action_index()
    {

        $search = Input::get('s') ?? null;

        $data = [];

        $query_medias = Media::with([]);

        $count = (clone $query_medias)->count();

        if ($search) {

            $query_medias = (clone $query_medias)->where('title', 'like', '%' . $search . '%');

        }

        $medias = $query_medias->take(30)->order_by('created_at', 'desc')->get();

        $data['medias'] = $medias;
        $data['count'] = $count;

        return View::make('admin::media.index', $data);

    }

    public function action_create()
    {

        $data = [];

        $html = View::make('admin::template.components.modal.upload-media', [])->render();

        return Response::json(['status' => true, 'html' => $html]);

    }

    public function action_store()
    {
        if (Request::method() == 'POST') {

            $rules = [
                'input_media' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:5120',
            ];

            $validation = Validator::make(Input::all(), $rules);

            if ($validation->fails()) {

                return Response::json(['status' => false, 'message' => $validation->errors->messages], 422);

            }

            $input_media = Input::file('input_media');

            if ($input_media['error'] == 0) {

                DB::pdo()->beginTransaction();

                try {

                    $original_name = $input_media['name'];
                    $type = $input_media['type'];
                    $tmp_name = $input_media['tmp_name'];
                    $size = $input_media['size'];

                    $upload_path = 'assets/packages/admin/media/';
                    $filename = pathinfo($original_name, PATHINFO_FILENAME);
                    $extension = pathinfo($original_name, PATHINFO_EXTENSION);

                    $new_name = $filename . '.' . $extension;
                    $counter = 2;

                    while (
                        file_exists($upload_path . $new_name) ||
                        DB::table('medias')->where('filename', $new_name)->count()
                    ) {
                        $new_name = $filename . '-' . $counter . '.' . $extension;
                        $counter++;
                    }

                    if (move_uploaded_file($tmp_name, $upload_path . $new_name)) {

                        $data_store = [
                            'title' => $filename,
                            'slug' => Str::slug($filename),
                            'guid' => asset('packages/admin/media/' . $new_name),
                            'type' => $type,
                            'filename' => $new_name,
                            'user_id' => Auth::user()->id ?? 1,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];

                        $id = DB::table('medias')->insert_get_id($data_store);

                        if ($id) {

                            $media = DB::table('medias')->where('id', $id)->first();
                            $count_media = DB::table('medias')->count();

                        }
                    }

                    DB::pdo()->commit();

                    return Response::json([
                        'status' => true,
                        'message' => 'Media uploaded successfully.',
                        'media' => $media,
                        'count_media' => $count_media
                    ], 200);

                } catch (\Exception $e) {

                    DB::pdo()->rollBack();
                    Log::error($e->getMessage());

                    return Response::json(['status' => false, 'message' => 'Media upload failed.'], 422);

                }

            } else {

                return Response::json(['status' => false, 'message' => 'Media upload failed.'], 422);

            }
        } else {

            return Response::json(['status' => false, 'message' => 'Method not allowed.'], 405);

        }
    }

    public function action_more()
    {
        if (Request::method() == 'POST') {

            $media_id_not = Input::get('media_id_not');

            $medias = DB::table('medias')
                ->where_not_in('id', $media_id_not)
                ->order_by('created_at', 'desc')
                ->take(30)
                ->get();

            return Response::json(['status' => true, 'medias' => $medias ?? []]);

        }

    }

    public function action_detail()
    {
        if (Request::method() == 'POST') {

            $media_id = Input::get('media_id');

            $media = Media::with(['user'])->where('id', $media_id)->first();

            if (!$media) {
                return Response::json(['status' => false, 'message' => 'Media not found.'], 404);
            }

            $html = View::make('admin::template.components.modal.detail-media', ['media' => $media])->render();

            return Response::json(['status' => true, 'html' => $html]);

        }

    }

    public function action_destroy()
    {
        if (Request::method() == 'DELETE') {

            $media_id = Input::get('media_id');

            $media = Media::with(['user'])->where('id', $media_id)->first();

            if (!$media) {
                return Response::json(['status' => false, 'message' => 'Media not found.'], 404);
            }

            DB::pdo()->beginTransaction();

            try {

                DB::table('medias')->where('id', $media_id)->delete();

                if (file_exists('assets/packages/admin/media/' . $media->filename)) {
                    unlink('assets/packages/admin/media/' . $media->filename);
                }

                $count_media = DB::table('medias')->count();

                DB::pdo()->commit();

                return Response::json(['status' => true, 'message' => 'Media deleted successfully.', 'count_media' => $count_media]);

            } catch (\Exception $e) {

                DB::pdo()->rollBack();
                Log::error($e->getMessage());

                return Response::json(['status' => false, 'message' => 'Failed to delete media.'], 500);

            }

        } else {

            return Response::json(['status' => false, 'message' => 'Method not allowed.'], 405);

        }

    }

    public function action_update()
    {
        if (Request::method() == 'PUT') {

            $media_id = Input::get('media_id');

            $media = Media::with(['user'])->where('id', $media_id)->first();

            if (!$media) {
                return Response::json(['status' => false, 'message' => 'Media not found.'], 404);
            }

            DB::pdo()->beginTransaction();

            try {

                $data_update = [
                    'title' => Input::get('title'),
                    'excerpt' => Input::get('caption') ?: null,
                    'updated_at' => now(),
                ];

                DB::table('medias')->where('id', $media_id)->update($data_update);

                DB::pdo()->commit();

                return Response::json(['status' => true, 'message' => 'Media updated successfully.']);

            } catch (\Exception $e) {

                DB::pdo()->rollBack();
                Log::error($e->getMessage());

                return Response::json(['status' => false, 'message' => 'Failed to update media.'], 500);

            }

        } else {

            return Response::json(['status' => false, 'message' => 'Method not allowed.'], 405);

        }

    }

    public function action_open()
    {

        $search = Input::get('s') ?? null;

        $data = [];

        $query_medias = Media::with([]);

        $count = (clone $query_medias)->count();

        if ($search) {

            $query_medias = (clone $query_medias)->where('title', 'like', '%' . $search . '%');

        }

        $medias = $query_medias->take(30)->order_by('created_at', 'desc')->get();

        $data['medias'] = $medias;
        $data['count'] = $count;

        $html = View::make('admin::template.components.modal.media', $data)->render();

        return Response::json(['status' => true, 'html' => $html]);

    }
}
