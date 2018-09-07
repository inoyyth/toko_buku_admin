@extends('layouts.default')
@section('title', $data['title'] . ' | bhinnekaweb.com')
@section('content')
<div class="row-fluid">
    <div class="span4">
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Category Form</h5>
        </div>
        <div class="widget-content">
            <div class="alert alert-danger" style="display:none"></div>
            <div class="alert alert-success" style="display:none"></div>
            {{ Form::open(['id'=>'form-category', 'url' => url('/category-save.html'), 'method' => 'post', 'class' => 'form']) }}
                {{ Form::hidden('id', '', ['class'=>'span11', 'placeholder'=>'tes']) }}
                <div class="control-group">
                    {{ Form::label('title', 'Title', ['class' => 'control-label'])}}
                    <div class="controls">
                        {{ Form::text('title', '', ['class'=>'span11', 'placeholder'=>'Title', 'required'=>'true']) }}
                    </div>
                </div>
                <div class="control-group">
                    {{ Form::label('description', 'Description', ['class' => 'control-label'])}}
                    <div class="controls">
                        {{ Form::textarea('description', '', ['class'=>'span11', 'placeholder'=>'Description']) }}
                    </div>
                </div>
                <div class="control-group">
                    <button type="submit" class="btn btn-success">Save</button> 
                    <button type="reset" class="btn btn-warning">Cancel</button>
                </div>
            {{ Form::close() }}
        </div>
        </div>
    </div>
    <div class="span8">
    <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Category List</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="row-fluid">

            </div>
            <table id="example" class="table table-bordered hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection
@push('footer_scripts')
{{ Html::script('https://code.jquery.com/jquery-3.3.1.js') }}
{{ Html::script('vendor/datatables/js/jquery.dataTables.min.js') }}
<script type="text/javascript">
function removeData(id) {
    var c = confirm('Delete this data ?');
    if (c) {
        jQuery.ajaxSetup({
            headers: {
                'Authorization':'Basic xxxxxxxxxxxxx',
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/category-delete-" + id + ".html",
            method: 'delete',
            success: function(data){
                jQuery('#example').DataTable().ajax.reload();
            }
        });
    }
}
function editData(data) {
    console.log('///',data);
}
function clearForm() {
    $('#form-category')[0].reset();
}

jQuery(document).ready(function(){
    var table = jQuery('#example').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "sDom": '<""l>t<"F"fp>',
        "bProcessing": true,
        "bServerSide": true,
        "language": {
            "processing": '<span style="z-index: 9999;" class="sr-only">Loading...</span> '
        },
        "ajax":{
            "url": "{{ url('/categorys-data.html') }}",
            "dataType": "json",
            "type": "POST",
            "data":{ _token: "{{csrf_token()}}"}
        },
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false,
                "sortable": false,
            },
            {
                "targets": [ 3 ],
                "visible": true,
                "searchable": false,
                "sortable": false,
            }
        ],
        "columns": [
            { "data": "id" },
            { "data": "title" },
            { "data": "description" },
            {
                "data": null,
                "render": function(data, type, full) {
                    let link = '<button class="btn btn-warning btn-xs" onclick="editData('+data.id+')">Edit</a> ';
                    link += '<button class="btn btn-danger btn-xs" onclick="removeData('+data.id+')">Delete</button>';
                    return link;
                },
                className: 'dt-body-center'
            }
        ],	
        order: [[0, 'desc']] 
    });

    jQuery('#form-category').submit(function(e){
        e.preventDefault();
        jQuery.ajaxSetup({
            headers: {
                'Authorization':'Basic xxxxxxxxxxxxx',
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{ url('/category-save.html') }}",
            method: 'post',
            dataType: 'json',
            data: {
                id: jQuery('#id').val(),
                title: jQuery('#title').val(),
                description: jQuery('#description').val()
            },
            success: function(data){
                jQuery('.alert').hide();
                jQuery('.alert p').remove();
                if (data.errors.length > 0) {
                    jQuery.each(data.errors, function(key, value){
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<p>'+value+'</p>');
                    });
                    jQuery(".alert-danger").show(0).delay(5000).hide(0);
                } else {
                    jQuery('.alert-success').show();
                    jQuery('.alert-success').append('<p>'+data.success+'</p>');
                    jQuery(".alert-success").show(0).delay(5000).hide(0);
                    clearForm();
                    jQuery('#example').DataTable().ajax.reload();
                }
            }
            
        });
    });
    jQuery("#reloadTable").click(function(){
        jQuery('#example').DataTable().ajax.reload();
    });
});
</script>
@endpush