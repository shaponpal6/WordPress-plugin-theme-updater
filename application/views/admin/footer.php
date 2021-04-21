
    </div>
    <!-- end wrapper -->

    <!--  support -->
    <!--    <img src=-->
    <? //=base_url("assets/img/help-desk.png");?><!-- data-toggle="modal" data-target="#myModal" >-->
<!--    <img src=--><?//= base_url("assets/img/support.png"); ?><!-- data-toggle="modal" data-target="#support" onclick="support_id()"-->
<!--         style="cursor:pointer;position: fixed; right: 0;bottom: 75px; background: #2bccc0; padding: 7px;">-->

    <!--  support -->

    <script>
        // Advance options
        function support_id() {
            $.post("last_support_id/", {'id': ''}, function (data3) {
                $('#ticket_id_show').html(data3);
                $('[name="ticket"]').val(data3);
            });
        }
    </script>

    <!--Support Model-->
    <div class="modal fade" id="support" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div id="loginbox" style="margin-top:50px;"
                     class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Support Ticket <b>#<span id="ticket_id_show"></span></b>
                                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal" style="float:right;">Close</button>
                            </div>
                        </div>

                        <div style="padding-top:30px" class="panel-body">
                            <?=form_open('supports/create');?>
                            <input type="hidden" name="ticket" value="">
                            <input type="hidden" name="name" value="<?=$this->session->userdata('userName');?>">
                            <input type="hidden" name="email" value="<?=$this->session->userdata('userEmail');?>">
                            <!----------- Block------------>

                            <!----------- Block------------>
                            <div class="row padding-bottom">
                                <div class="col-md-3">
                                    <h5>Topic: </h5>
                                </div>
                                <div class="col-md-9">
                                    <input required type="text" name="topic" placeholder="" class="form-control ">
                                </div>
                            </div>
                            <br/>
                            <!----------- Block------------>
                            <div class="row padding-bottom">
                                <div class="col-md-3">
                                    <h5>Description: </h5>
                                </div>
                                <div class="col-md-9">
                                    <textarea rows="3" required type="text" name="description"  class="form-control "></textarea>
                                </div>
                            </div>
                            <br/>
                            <!----------- Submit------------>
                            <div class="row padding-bottom">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-9">
                                    <input id="btn-login" name="supports" type="submit"
                                           class="btn btn-success"
                                           value="SEND" style="float: right; width: 100%;">
                                </div>
                            </div>
                            <br/>
                            <div class="modal-footer">


                            </div>
                            <?=form_close();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Support Model-->

    <!-- Core Scripts - Include with every page -->
    <script src="<?= base_url();?>assets/plugins/jquery-1.10.2.js"></script>
    <script src="<?= base_url();?>assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?= base_url();?>assets/plugins/pace/pace.js"></script>
    <script src="<?= base_url();?>assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="<?= base_url();?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?= base_url();?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

</body>

</html>
