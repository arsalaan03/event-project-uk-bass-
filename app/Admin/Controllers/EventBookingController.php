<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\EventBooking;

class EventBookingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'EventBooking';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new EventBooking());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('phone_code', __('Phone code'));
        $grid->column('phone', __('Phone'));
        $grid->column('tickets', __('Tickets'));
        $grid->column('user_id', __('User id'));
        $grid->column('event_id', __('Event id'));
 

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
        $show = new Show(EventBooking::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('phone_code', __('Phone code'));
        $show->field('phone', __('Phone'));
        $show->field('tickets', __('Tickets'));
        $show->field('user_id', __('User id'));
        $show->field('event_id', __('Event id'));
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
        $form = new Form(new EventBooking());

        $form->text('name', __('Name'));
        $form->text('phone_code', __('Phone code'));
        $form->phonenumber('phone', __('Phone'));
        $form->number('tickets', __('Tickets'));
        $form->number('user_id', __('User id'));
        $form->number('event_id', __('Event id'));

        return $form;
    }
}
