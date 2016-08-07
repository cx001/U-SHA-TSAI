<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                設定農場
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->
                <?php echo $__env->make('common.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <!-- New Task Form -->
                <form action="<?php echo e(url('farm')); ?>" method="POST" class="form-horizontal">
                    <?php echo e(csrf_field()); ?>


                    <!-- Task Name -->
                    <div class="form-group">

                        <label for="farm-name" class="col-sm-3 control-label">設定農場位置及光照</label><br><br>

                        <div class="col-sm-6">
                            農場名稱
                            <input type="text" name="name" id="farm-name" class="form-control">
                            經度
                            <input type="text" name="lati" id="farm-lat" class="form-control">
                            緯度
                            <input type="text" name="lngi" id="farm-lng" class="form-control">
                        </div>

                        <div class="col-sm-6">
                            <input type="radio" name="lightness" value=3 checked>全日照<br>
                            <input type="radio" name="lightness" value=2> 半日照<br>
                            <input type="radio" name="lightness" value=1>低光
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>確定
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
        <?php if(count($farms) > 0): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                農場資訊
            </div>

            <div >
                <table>
                    <thead>
                        <th>Farm</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody>
                        <?php foreach($farms as $farm): ?>
                        <tr>
                            <td ><div><?php echo e($farm->name); ?></div>
                                <div>
                                
                                </div>
                            </td>

                            <!-- Task Delete Button -->
                            <td>
                                <form action="<?php echo e(url('farm/' . $farm->id)); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo e(method_field('DELETE')); ?>


                                    <button type="submit" id="delete-farm-<?php echo e($farm->id); ?>" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>