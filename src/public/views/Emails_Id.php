<?php require_once 'header.php'; ?>


<div class="row">
  <div class="col-md-6">
    <div class="card">

<?php

      require_once 'utils/Form.php';
      require_once 'utils/ApiClient.php';
      require_once 'utils/PostHandler.php';

      if($_id!="add"){

        // Edit Form

        $api = new ApiClient();
        $api->get( '/admin/emails/'.$_id , '' , ['Access-Token'=>$config['access_token']] );

        if ($api->get_response_code()!=200){
          redirect('/emails');
        }

        $form = new Form();
        $form->set_action('#');
        $form->set_method('POST');

        $form->set_inputs([
          ['title'=>'ID', 'disabled'=>true, 'required'=>true, 'type'=>'text', 'name'=>'_id', 'value'=>$api->get_response()->_id, 'placeholder'=>''],
          ['title'=>'Subject', 'disabled'=>true, 'required'=>true, 'type'=>'text', 'name'=>'subject', 'value'=>$api->get_response()->subject, 'placeholder'=>''],
          ['title'=>'Message', 'disabled'=>true, 'required'=>true, 'type'=>'text', 'name'=>'message', 'value'=>$api->get_response()->message, 'placeholder'=>''],
          ['title'=>'Configuration', 'disabled'=>true, 'required'=>true, 'type'=>'text', 'name'=>'config', 'value'=>$api->get_response()->config, 'placeholder'=>''],
          ['title'=>'User', 'disabled'=>true, 'required'=>true, 'type'=>'text', 'name'=>'config', 'value'=>$api->get_response()->user, 'placeholder'=>''],
          ['title'=>'Email Service', 'disabled'=>true, 'required'=>true, 'type'=>'text', 'name'=>'config', 'value'=>$api->get_response()->email_service, 'placeholder'=>''],
        ]);

        /*$form->set_buttons([
          ['title'=>'Save', 'enabled'=>true, 'value'=>'update']
        ]);*/
        $form->show_form();



      } else {
        // Create Form

        $form = new Form();
        $form->set_action('#');
        $form->set_method('POST');

        $form->set_inputs([
          //
        ]);

        $form->set_buttons([
          ['title'=>tr('Create'), 'enabled'=>true, 'value'=>'create']
        ]);
        $form->show_form();



        $handler = new PostHandler();
        $handler->set_api_action_uri('/zazu_device/');
        $handler->set_form_action_create('/devices/');
        $handler->set_id($device_id);
        $handler->set_id_name('device_id');
        $handler->set_params([
          //
        ]);
        $handler->handle();

      }

?>

    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <!-- NOTES CONTENT -->
      <h3>Email</h3>
    </div>
  </div>
</div>


<?php require_once 'footer.php'; ?>
