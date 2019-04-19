<?php require_once 'header.php'; ?>

<div class="row">
    <div class="col-12">
      <div class="card">
        <a href="/emails/add"><button type="submit" class="btn btn-success">Create</button></a>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card">
      <?php

        require_once 'utils/Table.php';
        require_once 'utils/ApiClient.php';

        $header = array(
          'Access-Token' => $config['access_token']
        );
        $model = array();

        $api = new ApiClient();
        $api->get( '/admin/emails' ,  '' , $header );


        if($api->get_response_code()!=200){ ?>
          <h2>Error! No data received (<?php echo $api->get_response_code(); ?>)</h2>
        <?php } else {
          $table = new Table();
          $table->set_table_name('Emails');
          $table->set_action_uri('/emails/');
          $table->set_action_column('_id');
          $table->set_body_array($api->get_response());
          $table->set_columns(6);
          $table->set_header_array([1=>'_id', 2=>'subject', 3=>'message', 4=>'config', 5=>'email_service', 6=>'user']);
          $table->set_header_titles([1=>'ID', 2=>'Subject', 3=>'Message', 4=>'Config', 5=>'Email Service', 6=>'User']);
          $table->set_tr_action(true);
          $table->make_table();
        }

      ?>
    </div>
  </div>
</div>

<?php require_once 'footer.php'; ?>
