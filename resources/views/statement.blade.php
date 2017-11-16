@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <ol class="breadcrumb">
                <li><a href="#">الرئيسية</a></li>
                <li class="active">البنود</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> إدارة البنود</div>
                </div> <!-- /panel-heading -->
                <div class="panel-body div-body-modal">

                    <div class="div-add-statement-modal pull-right" style="padding-bottom:20px;">
                        <button class="btn btn-default" id="add-statement-modal-btn"> <i class="glyphicon glyphicon-plus-sign"></i> إضافة بند </button>
                    </div> <!-- /div-action -->

                    {{ $category->id }}
                    <table class="table" id="statements-table">
                        <thead>
                        <tr>
                            <th  style="text-align: right">#</th>
                            <th  style="text-align: right">البند</th>
                            <th  style="text-align: right">الحد الأعلى</th>
                            <th  style="text-align: right">الحد الأدنى</th>
                            <th style="width:15%; text-align: right">التحكم</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($statements as $statement)
                            <tr>
                                <td>{{ $statement->id }}</td>
                                <td>{{ $statement->title }}</td>
                                <td>{{ $statement->max_value }}</td>
                                <td>{{ $statement->min_value }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            التحكم <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a type="button" data-toggle="modal" id="edit-statement-modal-btn" data-statementid="{{$statement->id}}"> <i class="glyphicon glyphicon-edit"></i> تعديل</a></li>
                                            <li><a type="button" data-toggle="modal" data-statementid="{{$statement->id}}" data-target="#removeStatementsModal" id="remove-statement-modal-btn" onclick=""> <i class="glyphicon glyphicon-trash"></i> حذف</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                    <!-- /table -->

                </div> <!-- /panel-body -->
            </div> <!-- /panel -->
        </div> <!-- /col-md-12 -->
    </div> <!-- /row -->


    <!-- add statement -->
    <div class="modal fade" id="addStatementModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <form class="form-horizontal" id="addStatementForm">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-plus"></i> إضافة بند</h4>
                    </div>
                    <div class="modal-body">

                        <div id=""></div>

                        <div class="form-group">
                            <label for="category_name" class="col-sm-4 control-label">التصنيف </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7" id="error_add-category_name">
                                <input type="text" class="form-control" id="category_name" placeholder="التصنيف" name="category_name" autocomplete="off">
                                <h6 class="ErrorRed"></h6>
                            </div>
                        </div> <!-- /form-group-->

                        <div class="form-group">
                            <label for="statement-title" class="col-sm-4 control-label">البند </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7" id="error_add-statement_title">
                                <input type="text" class="form-control" id="statement-title" placeholder="البند" name="statement_title" autocomplete="off">
                                <h6 class="ErrorRed"></h6>
                            </div>
                        </div> <!-- /form-group-->
                        <div class="form-group">
                            <label for="statement-max_value" class="col-sm-4 control-label">الحد الأعلى </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7" id="error_add-statement-max_value">
                                <input type="number" class="form-control" id="statement-max_value" placeholder="الحد الأعلى" name="statement-max_value" autocomplete="off">
                                <h6 class="ErrorRed"></h6>
                            </div>
                        </div> <!-- /form-group-->
                        <div class="form-group">
                            <label for="statement-min_value" class="col-sm-4 control-label">الحد الأدنى </label>
                            <label class="col-sm-1 control-label">: </label>
                            <div class="col-sm-7" id="error_add-statement-min_value">
                                <input type="number" class="form-control" id="statement-min_value" placeholder="الحد الأدنى" name="statement-min_value" autocomplete="off">
                                <h6 class="ErrorRed"></h6>
                            </div>
                        </div> <!-- /form-group-->
                    </div> <!-- /modal-body -->

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> إغلاق</button>

                        <button type="button" class="btn btn-primary" id="add_statement_modal_save" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> حفظ</button>
                    </div> <!-- /modal-footer -->
                </form> <!-- /.form -->
            </div> <!-- /modal-content -->
        </div> <!-- /modal-dialog -->
    </div>
    <!-- /add category -->


    <!-- edit statement -->
    <div class="modal fade" id="edit-statement-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <form class="form-horizontal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-edit"></i> تعديل بيانات البند</h4>
                    </div>
                    <div class="modal-body">

                        <div id="edit-statements-messages"></div>

                        <div class="edit-categories-result">
                            <div class="form-group">
                                <label for="edit-category_name" class="col-sm-4 control-label">البند: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-7" id="error_edit-statement_title">
                                    <input type="text" class="form-control" id="edit-statement_title" placeholder="البند" name="edit-statement_title" autocomplete="off">
                                    <h6 class="ErrorRed"></h6>
                                </div>
                            </div> <!-- /form-group-->
                            <div class="form-group">
                                <label for="edit-statement_max_value" class="col-sm-4 control-label">الحد الأعلى: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-7" id="error_edit-statement_max_value">
                                    <input type="number" class="form-control" id="edit-statement_max_value" placeholder="الحد الأعلى" name="edit-statement_max_value" autocomplete="off">
                                    <h6 class="ErrorRed"></h6>
                                </div>
                            </div> <!-- /form-group-->
                            <div class="form-group">
                                <label for="edit-statement_min_value" class="col-sm-4 control-label">الحد الأدنى: </label>
                                <label class="col-sm-1 control-label">: </label>
                                <div class="col-sm-7" id="error_edit-statement_min_value">
                                    <input type="number" class="form-control" id="edit-statement_min_value" placeholder="الحد الأدنى" name="edit-statement_min_value" autocomplete="off">
                                    <h6 class="ErrorRed"></h6>
                                </div>
                            </div> <!-- /form-group-->

                        </div>
                        <!-- /edit statement result -->

                    </div> <!-- /modal-body -->

                    <div class="modal-footer edit-statements-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> إغلاق</button>

                        <button type="button" class="btn btn-success" id="edit-categories-btn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> حفظ</button>
                    </div>
                    <!-- /modal-footer -->
                    <div id="edit-statement-msg"></div>

                </form>
                <!-- /.form -->
            </div>
            <!-- /modal-content -->
        </div>
        <!-- /modal-dialog -->
    </div>
    <!-- /statements brand -->

    <!-- delete statements modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="delete-statements-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> حذف البند</h4>
                </div>
                <div class="modal-body">
                    <p>هل تريد حذف البند بالتأكيد؟</p>
                </div>
                <div class="modal-footer delete-categories-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> إغلاق</button>
                    <button type="button" class="btn btn-primary" id="delete-statements-btn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> حذف</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /delete category modal -->
    <script>
        var token = '{{ Session::token() }}';

    </script>
@endsection