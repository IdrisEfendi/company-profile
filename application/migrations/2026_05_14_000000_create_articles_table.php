<?php

defined('DS') or exit('No direct access.');

class Create_Articles_Table
{
    /**
     * Buat perubahan di database.
     *
     * @return void
     */
    public function up()
    {
        Schema::create_if_not_exists('articles', function ($table) {
            $table->increments('id');
            $table->string('title', 180);
            $table->string('slug', 200)->unique();
            $table->text('excerpt')->nullable();
            $table->longtext('content');
            $table->text('featured_image')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft')->index();
            $table->timestamp('published_at')->nullable()->index();
            $table->boolean('is_active')->default(1)->index();
            $table->timestamps();
        });
    }

    /**
     * Urungkan perubahan di database.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop_if_exists('articles');
    }
}
