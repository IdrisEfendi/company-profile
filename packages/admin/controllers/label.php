<?php

defined('DS') or exit('No direct access.');

class Admin_Label_Controller extends Controller
{

    public function __construct()
    {
        $this->middleware('before', 'csrf|throttle:60,1');
    }

    public function action_index()
    {
        $search = Input::get('s');

        $data = [];

        $query_labels = Label::with([]);

        if (!empty($search)) {
            $query_labels = $query_labels->where('name', 'like', '%' . $search . '%');
        }

        $labels = Helper::pagination($query_labels, 50);

        $data = array_merge($data, $labels);

        return View::make('admin::label.index', $data);

    }

    public function action_create()
    {

        $data = [];

        return View::make('admin::label.create', $data);

    }

    public function action_store()
    {

        if (Request::method() == 'POST') {

            $input = Input::all();

            $rules = [
                'name' => 'required',
                'slug' => 'unique:labels,slug',
            ];

            $validation = Validator::make($input, $rules);

            if ($validation->fails()) {

                return Redirect::back()->with_errors($validation)->with_input();

            }

            $data_store = [];

            $data_store['name'] = $input['name'];
            $data_store['slug'] = $input['slug'] ? Str::slug($input['slug']) : Str::slug($input['name']);
            $data_store['description'] = $input['description'] ?? null;
            $data_store['count'] = 0;
            $data_store['created_at'] = now();
            $data_store['updated_at'] = now();

            DB::pdo()->beginTransaction();

            try {

                $label_id = DB::table('labels')->insert_get_id($data_store);

                DB::pdo()->commit();

                return Redirect::to_route('admin-label-edit', [$label_id])->with('success', 'Label created successfully!');

            } catch (Exception $e) {

                DB::pdo()->rollBack();
                Log::error($e->getMessage());

                return Redirect::back()->with('error', 'Something went wrong!');

            }

        } else {

            return View::make('error.404');

        }

    }

    public function action_edit($id)
    {

        $data = [];

        $label = Label::with([])->where_in('id', [$id])->first();

        if (!$label) {

            return Redirect::back()->with('error', 'Label not found!');

        }

        $data['label'] = $label;

        return View::make('admin::label.edit', $data);

    }

    public function action_update($id)
    {

        if (Request::method() == 'PUT') {

            $label = Label::with([])->where_in('id', [$id])->first();

            if (!$label) {

                return Redirect::back()->with('error', 'Label not found!');

            }

            $label_id = $label->id;

            $input = Input::all();

            $rules = [
                'name' => 'required',
            ];

            $validation = Validator::make($input, $rules);

            if ($validation->fails()) {

                return Redirect::back()->with_errors($validation)->with_input();

            }

            DB::pdo()->beginTransaction();

            try {

                $data_update = [];

                $data_update['name'] = $input['name'];
                $data_update['slug'] = $input['slug'] ? Str::slug($input['slug']) : Str::slug($input['name']);
                $data_update['description'] = $input['description'] ?? null;
                $data_update['count'] = 0;
                $data_update['updated_at'] = now();

                Label::where_in('id', [$label_id])->update($data_update);

                DB::pdo()->commit();

                return Redirect::to_route('admin-label-edit', [$label_id])->with('success', 'Label updated successfully!');

            } catch (\Exception $e) {

                DB::pdo()->rollBack();
                Log::error($e->getMessage());

                return Redirect::back()->with('error', 'Something went wrong!');

            }

        } else {

            return View::make('error.404');

        }

    }

    public function action_destroy($id)
    {

        if (Request::method() == 'DELETE') {

            $label = Label::with([])->where_in('id', [$id])->first();

            if (!$label) {

                return Redirect::back()->with('error', 'Label not found!');

            }

            $label_id = $label->id;

            DB::pdo()->beginTransaction();

            try {

                Label::where_in('id', [$label_id])->delete();

                $menus = Menu::where_in('label_id', [$label_id])->count();

                if ($menus) {

                    Menu::where_in('label_id', [$label_id])->delete();

                }

                DB::pdo()->commit();

                return Redirect::to_route('admin-label')->with('success', 'Label deleted successfully!');

            } catch (\Exception $e) {

                DB::pdo()->rollBack();
                Log::error($e->getMessage());

                return Redirect::back()->with('error', 'Something went wrong!');

            }

        } else {

            return View::make('error.404');

        }

    }
}