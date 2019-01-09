@extends('layouts.app')

@section('content')

    <div class="row px-md-5 px-0 pt-4 border-top bg-body">
        <div class="col-md-12">
            <div class="row">
                <div class="col-12 my-3">
                    <!--Main title-->

                    <h4 class="float-left mr-5">Calculators</h4>

                    <!--Breadcrumb-->

                    <nav>
                        <ol class="breadcrumb small p-0 mt-2">

                            <li class="breadcrumb-item">
                                <a href="#" class="text-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active font-weight-light">Calculators</li>
                        </ol>
                    </nav>

                    <!--End breadcrumb-->
                </div>


                <!--Note: Here starts calculators-->

                <div class="col-6">

                    <div class="row">


                        <div class="col-8 bg-white border mb-4 border-bottom-3 mx-auto text-center">
                            <div class="border-bottom mb-4 row mx-0">

                                <div class="col business-calculator">
                                    <h4 class="text-primary my-4">Business Loans Calculators</h4>
                                    <img src="">
                                    <p>Lorem ipsum dolor sit amet consectectur prima donna auditoria, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pulvinar elit eget urna rhoncus, sit.

                                    </p>
                                    <button class="btn btn-primary my-4 btn-block">Start</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
2
                <!--Second box for calculators-->

                <div class="col-6">

                    <div class="row">
                        <!--Box lead info-->

                        <div class="col-8 bg-white border mb-4 border-bottom-3 mx-auto">
                            <div class="border-bottom mb-4 row mx-0">

                                <!--Box lead info collapsed-->

                                <div class="col collapse show lead-info">
                                    <div class="row">
                                        <div class="col-auto">
                                            <div class="text-center">
                                                <img src="../img/lead_profile.jpg" class="rounded-circle my-3 img-thumbnail info-img">
                                            </div>
                                        </div>
                                        <div class="col px-0">
                                            <div class="col-12 small px-0">
                                                <h6 class="mb-2 text-primary mt-3 field">
                                                    <span class="small ion ion-edit position-absolute"></span>
                                                    <input readonly id="lead-name" placeholder="Contact name" class="text-primary border-0 w-100" value="Chloe Moretz">
                                                </h6>
                                            </div>
                                            <div class="col-12 small px-0">
                                                <p class="mb-2 field">
                                                    <span class="small ion ion-edit position-absolute"></span>
                                                    <input readonly id="lead-phone" placeholder="Phone Number" class="text-default border-0 w-100" value="(458) 245-2145">
                                                </p>
                                            </div>
                                            <div class="col-12 small px-0">
                                                <p class="field">
                                                    <span class="small ion ion-edit position-absolute"></span>
                                                    <input readonly id="lead-email" placeholder="Email" class="text-default border-0 w-100" value="b.flash@mail.com">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--End lead info collapsed-->

                            </div>
                        </div>
                        <!--End Box lead info-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Scripts in jquery that need to be changed into vue.js good luck with that Mauricio (You will need it) -->
    <script>
        $(document).ready(function () {
            //Action for create notes
            $("#textarea-note-create").keyup(function () {
                if ($('#textarea-note-create').val() == "") {
                    $('#buttons-note-create').slideUp();
                }
                else {
                    $('#buttons-note-create').slideDown();
                }
            });

            // action for create tasks
            $('.tasks-fusion').keyup(function () {
                if ($('#input-task-create').val() == "" && $('#textarea-task-create').val() == "") {
                    $('#buttons-task-create').slideUp();
                }
                else {
                    $('#buttons-task-create').slideDown();
                }

                if ($('#input-task-create').val() == "" && $('#textarea-task-create').val() != "") {
                    $('#buttons-task-create .btn-primary').addClass('disabled');
                }
                else {
                    $('#buttons-task-create .btn-primary').removeClass('disabled');
                }

            });

            // action for create meeting
            $('.meetings-fusion').keyup(function () {
                if ($('#input-meeting-create').val() == "" && $('#textarea-meeting-create').val() == "") {
                    $('#buttons-meeting-create').slideUp();
                }
                else {
                    $('#buttons-meeting-create').slideDown();
                }

                if ($('#input-meeting-create').val() == "" && $('#textarea-meeting-create').val() != "") {
                    $('#buttons-meeting-create .btn-primary').addClass('disabled');
                }
                else {
                    $('#buttons-meeting-create .btn-primary').removeClass('disabled');
                }
            });

            // action for create email
            $('.emails-fusion').keyup(function () {
                if ($('#input-email-create').val() == "" && $('#textarea-email-create').val() == "") {
                    $('#buttons-email-create').slideUp();
                }
                else {
                    $('#buttons-email-create').slideDown();
                }

                if ($('#input-email-create').val() != "" && $('#textarea-email-create').val() != "") {
                    $('#buttons-email-create .btn-primary').removeClass('disabled');
                }
                else {
                    $('#buttons-email-create .btn-primary').addClass('disabled');
                }
            });

            // action for create call
            $('.calls-fusion').keyup(function () {
                if ($('#input1-call-create').val() == "" && $('#input2-call-create').val() == "" && $('#textarea-call-create').val() == "") {
                    $('#buttons-call-create').slideUp();
                }
                else {
                    $('#buttons-call-create').slideDown();
                }

                if ($('#input1-call-create').val() != "" && $('#input2-call-create').val() != "") {
                    $('#buttons-call-create .btn-primary').removeClass('disabled');
                }
                else {
                    $('#buttons-call-create .btn-primary').addClass('disabled');
                }
            });

            //HERE STARTS DE SCRPITS FOR EDIT ACTIVITIES

            //Edit notes

            $('.click-edit').click(function () {
                $(this).closest('.activities').addClass('edit')
            });
            $('.not-edit').click(function () {
                $(this).closest('.activities').removeClass('edit')
            });

            //SCRIPTS PARA COLLAPSE INFO

            // arrow animation

            $('.link-collapse').click(function () {
                $(this).find('.arrow-collapse').toggleClass('rotated');
            });

            //STATUS SCRIPTS

            $('#choose-progress').click(function () {
                $('#lead-status-progress, #lead-status-new-lead').addClass('bg-success border-success').removeClass('bg-light border-light bg-danger border-danger bg-warning border-warning');
                $('#lead-status-complete').addClass('bg-light border-light').removeClass('bg-danger border-danger bg-success border-success');
                $("#lead-status-progress span").text('Progress');
                $("#lead-status-complete span").text('Complete');
            });
            $('#choose-no-response').click(function () {
                $('#lead-status-progress, #lead-status-new-lead').addClass('bg-warning border-warning').removeClass('bg-light border-light bg-danger border-danger bg-success border-success hovered4');
                $('#lead-status-complete').addClass('bg-light border-light').removeClass('bg-danger border-danger bg-success border-success hovered4');
                $("#lead-status-progress span").text('No response');
                $("#lead-status-complete span").text('Complete');
            });

            $('#choose-complete').click(function () {
                $('#lead-status-progress, #lead-status-new-lead, #lead-status-complete').addClass('bg-success border-success').removeClass('bg-light border-light bg-danger border-danger bg-warning border-warning hovered2 hovered3');
                $("#lead-status-complete span").text('Complete');
                $("#lead-status-progress span").text('Progress');
            });

            $('#choose-dead-lead').click(function () {
                $('#lead-status-progress, #lead-status-new-lead, #lead-status-complete').addClass('bg-danger border-danger').removeClass('bg-light border-light bg-success border-success hovered2 hovered3');
                $("#lead-status-complete span").text('Dead lead');
            });
            $('#lead-status-new-lead').click(function () {

                $('#lead-status-progress, #lead-status-complete').removeClass('bg-danger border-danger bg-success border-success hovered2 hovered3 bg-warning border-warning').addClass('bg-light border-light');
                $('#lead-status-new-lead').addClass('bg-success border-success').removeClass('bg-danger border-danger bg-warning border-warning hovered2 hovered3');
                $("#lead-status-progress span").text('Progress');
                $("#lead-status-complete span").text('Complete');

            });

            $('#lead-status-complete').hover(function () {
                $('#lead-status-progress').toggleClass('hovered')
            });
            $('#lead-status-progress').hover(function () {
                $('#lead-status-complete.bg-success').toggleClass('hovered2');
                $('#lead-status-complete.bg-danger').toggleClass('hovered3');
            });
            $('#lead-status-new-lead').hover(function () {
                $('#lead-status-progress.bg-success,#lead-status-complete.bg-success').toggleClass('hovered2');
                $('#lead-status-progress.bg-danger,#lead-status-complete.bg-danger').toggleClass('hovered3');
                $('#lead-status-progress.bg-warning').toggleClass('hovered4');
            });

            //Edit info scripts

            $('.field').hover(function () {
                $(this).find('.ion-edit').toggleClass('text-secondary');
            });

            $('.field').click(function () {
                $(this).find('textarea, input').attr('readonly', false);
            });

            //Modal validations scripts

            $('.modal-content textarea').keyup(function(){
                if($(this).val() != ""){
                    $('.save-note').removeClass('disabled');
                }
                else {
                    $('.save-note').addClass('disabled');
                }
            });

            $('.close, .discard').click(function() {

                $('.modal-content textarea').val('');
            });
        });
    </script>
@endsection
