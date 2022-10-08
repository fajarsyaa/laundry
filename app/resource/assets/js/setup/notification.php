<script>
    $(document).ready(function(){
        <?php

            @$title_alert_setup = $_SESSION["title_alert_setup"];
            @$msg_alert_setup   = $_SESSION["message_alert_setup"];
            @$type_alert_setup  = $_SESSION["type_alert_setup"];

            if (!empty($title_alert_setup)) {
        ?>
        $.notify({
            
            <?php

                if ($type_alert_setup == "success") {
                    $icon = "check";
                    $type = "success";
                }

                if ($type_alert_setup == "error") {
                    $icon = "alert";
                    $type = "danger";
                }
            ?>

            icon: 'mdi mdi-<?= $icon ?>',
            title: '<?= $title_alert_setup ?>',
            message: '<?= $msg_alert_setup ?>'
        }, {
            placement: {
                align: "right",
                from: "top"
            },
            showProgressbar: true,
            timer: 10,
            // settings
            type: '<?= $type ?>',
            template: '<div data-notify="container" class=" bootstrap-notify alert " role="alert">' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar bg-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<div class="media "> <div class="avatar m-r-10 avatar-sm"> <div class="avatar-title bg-{0} rounded-circle"><span data-notify="icon"></span></div> </div>' +
            '<div class="media-body"><div class="font-secondary" data-notify="title">{1}</div> ' +
            '<span class="opacity-75" data-notify="message">{2}</span></div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            ' <button type="button" aria-hidden="true" class="close" data-notify="dismiss"><span>x</span></button></div></div>'

        });
        <?php 
            } 
            // then unset all notification
            unset($_SESSION["title_alert_setup"]);
            unset($_SESSION["message_alert_setup"]);
            unset($_SESSION["type_alert_setup"]);
        ?>
    });
</script>