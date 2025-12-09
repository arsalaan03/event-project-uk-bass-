<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Event;
use \App\Models\EventCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EventController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Event';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Event());

        $grid->column('id', __('Id'));
        $grid->column('event_id', __('Event id'));
        $grid->column('title', __('Title'));
        $grid->column('slug', __('Slug'));
        $grid->column('image', __('Image'));
        $grid->column('short_content', __('Short content'));
        $grid->column('date_time', __('Date time'));
        $grid->column('overview', __('Overview'));
        $grid->column('location', __('Location'));
        $grid->column('map', __('Map'));
        $grid->column('price', __('Price'));
        $grid->column('event_date_time', __('Event date time'));
        $grid->column('user_id', __('User id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Event::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('event_id', __('Event id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('image', __('Image'));
        $show->field('short_content', __('Short content'));
        $show->field('date_time', __('Date time'));
        $show->field('overview', __('Overview'));
        $show->field('location', __('Location'));
        $show->field('map', __('Map'));
        $show->field('price', __('Price'));
        $show->field('event_date_time', __('Event date time'));
        $show->field('user_id', __('User id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Event());

        $form->select('event_id', __('Event id'))->options(function () {
            return EventCategory::all()->pluck('name', 'id');
        })->required();
        $form->text('title', __('Title'));
        $form->saving(function (Form $form) {
            $form->slug = Str::slug($form->title);
        });
        $form->hidden('slug', __('Slug'));
        $form->image('image', __('Image'));
        $form->text('short_content', __('Short content'));
        $form->text('date_time', __('Date time'));
        $form->textarea('overview', __('Overview'));
        $form->textarea('location', __('Location'));
        $form->text('map', __('Map'));
        $form->text('price', __('Price'));
        $form->date('event_date_time', __('Event date time'))->default(date('Y-m-d'));
        $form->number('user_id', __('User id'))->readonly();

        return $form;
    }
}
