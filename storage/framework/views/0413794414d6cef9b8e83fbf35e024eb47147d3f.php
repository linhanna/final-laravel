
<?php $__env->startSection('content'); ?>
    <div class="space50">&nbsp;</div>
    <div class="container beta-relative">
        <div class="container">
            <div class="col-12 col-md-6" style="background: red;color:white">Số sản phẩm: <?php echo e(count($products)); ?></div>
            <div class="col-12 col-md-6" style="background: blue;color:white">Đã bán: <br />
                <p>Tổng: </p>
                <p>Hôm nay: 1</p>
                <p>Tháng này: 3</p>
                <p>Năm nay: 4</p>
            </div>
        </div>
        <div class="pull-left">
            <h2>List</h2>
        </div>
        <div class="pull-right">
            <a href="" class="btn btn-primary">
                Xuất ra PDF
            </a>
        </div>
        <table id="table_admin_product" class="table table-striped display">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Unit_price</th>
                    <th scope="col">Promotion_price</th>
                    <th scope="col">Unit</th>
                    <th scope="col">New</th>
                    <th scope="col"><a href="<?php echo e(route('add-product')); ?>" class="btn btn-primary"
                            style="width:80px;">Add</a></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="products-list-admin">
                        <th scope="row"><?php echo e($product->id); ?></th>
                        <th><img src="source/image/product/<?php echo e($product->image); ?>" alt="image" style="height: 100px;" />
                        </th>
                        <td><?php echo e($product->name); ?></td>
                        <td><?php echo e($product->id_type); ?></td>
                        <td><?php echo e($product->description); ?></td>
                        <td><?php echo e($product->unit_price); ?></td>
                        <td><?php echo e($product->promotion_price); ?></td>
                        <td><?php echo e($product->unit); ?></td>
                        <td><?php echo e($product->new); ?></td>
                        <td>
                            <a href='admin-edit-form/<?php echo e($product->id); ?>' type="submit" class="btn btn-warning"
                                style="width:80px;">Edit</a>
                            <form role="form" action="admin-delete/<?php echo e($product->id); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <button name="edit" type="submit" class="btn btn-danger"
                                    style="width:80px;">Delete</button>
                            </form>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="space50">&nbsp;</div>
    </div>
    <script>
        $(document).ready(function() {
            $('#table_admin_product').DataTable();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cake\cakeshop-React-Laravel\resources\views/pageAdmin/admin.blade.php ENDPATH**/ ?>