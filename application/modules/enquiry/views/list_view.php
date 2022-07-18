<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo (isset($pvalue['page_heading'])) ? $pvalue['page_heading'] : 'List'; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo WEB_URL . 'dashboard/myDashboard' ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?php echo (isset($pvalue['page_heading'])) ? $pvalue['page_heading'] : 'List'; ?> List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <?php echo (isset($pvalue['page_heading'])) ? $pvalue['page_heading'] : 'List'; ?> List</h3>

                <div class="card-tools">
                    <a href="<?php echo WEB_URL . 'dashboard/myDashboard'; ?>" class="btn btn-sm btn-danger">Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="search_key" id="search_key"
                            placeholder="By Name" />
                    </div>
                    <div class="col-sm-3">
                        <button type="button" id="searchBtn" class="btn btn-success">Search</button>
                        <button type="button" id="resetBtn" class="btn btn-danger">Reset</button>
                    </div>
                </div>
                <br>
                <?php $this->load->view('adminlayout/message_view');?>
                <div id="subjectContent"></div>
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
subjectList(page_url = false);

$(document).on('click', "#searchBtn", function(event) {
    subjectList(page_url = false);
    event.preventDefault();
});

$(document).on('click', "#resetBtn", function(event) {
    $("#search_key").val('');
    subjectList(page_url = false);
    event.preventDefault();
});

$(document).on('click', ".pagination li a", function() {
    var page_url = $(this).attr('href');
    subjectList(page_url);
    return false;
});

function subjectList(page_url) {
    var base_url = $('meta[name="weburl"]').attr('content');
    base_url = base_url + "enquiry/get_enquiry_ajax_list";
    var search_key = $('#search_key').val();
    var dataString = 'search_key=' + search_key;
    if (page_url) {
        base_url = page_url;
    }
    $.ajax({
        type: "POST",
        url: base_url,
        data: dataString,
        success: function(response) {
            $("#subjectContent").html(response);
        }
    })
}
</script>

<script>
//Delete Records
$(document).on("click", ".delete-btn", function() {
    if (confirm("Do you really want to delete this record ?")) {
        var studentId = $(this).data("id");
        var element = this;
        var base_url = $('meta[name="weburl"]').attr('content');
        base_url = base_url + "enquiry/deleteSingleData";
        //alert(studentId);
        $.ajax({
            url: base_url,
            type: "POST",
            data: {
                id: studentId
            },
            success: function(data) {
                if (data == 1) {
                    $(element).closest("tr").fadeOut();
                } else {
                    $("#error-message").html("Can't Delete Record.").slideDown();
                    $("#success-message").html("Deleted Record.").slideUp();
                }
            }
        });
    }
});
</script>