<div class="jumbotron" data-pages="parallax">
    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
        <div class="inner">
            <h2 class="clearfix"><span class="icon-thumbnail text-white pull-left">B</span>Bantuan</h2>
            <ul class="breadcrumb">
                <li>
                    <a href="dashboard">Dashboard</a>
                </li>
                <li><span class="active">Bantuan</span></li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid container-fixed-lg">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="clearfix">
                        <input type="text" id="search-table" class="form-control m-b-40" placeholder="Search">
                    </div>

                    <table class="table table-hover" id="mytable" width="100%">
                        <thead>
                        <tr>
                            <th class="bg-primary text-white">Bantuan</th>
                            <?php if (get_staff_user_id() == '6bmgy' || get_staff_user_id() == 'duji9') { ?>
                            <th class="bg-primary"></th>
                            <?php } ?>
                        </tr>
                        </thead>

                    </table>
                </div>
                <div class="col-md-8">
                    <?php if (get_staff_user_id() == '6bmgy' || get_staff_user_id() == 'duji9') { ?>
                    <a href="bantuan/form" class="btn btn-primary pull-right">
                        <i class="fa fa-plus"></i>
                        <span class="bold">Tambah</span>
                    </a>
                    <div class="clear"></div>
                    <?php } ?>

                    <div class="panel panel-default m-t-40">
                        <div class="panel-body">
                            <div id="tampil">
                                <h4><i class="fa fa-arrow-circle-left"></i> Klik List disebelah kiri untuk melihat detail bantuan.</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>
    </div>
</div>