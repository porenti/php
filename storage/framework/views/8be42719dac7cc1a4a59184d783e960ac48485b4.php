<?php
/**
 * @var \App\Models\Shop\CartItem $cartItem
 * @var \App\Models\Shop\Coupon $coupon
 * @var \App\Models\Shop\Cart $cart
 */
?>


<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-between" style="color:black">
            <div class="col-lg-8">
                <?php if(isset($cartItems)): ?>
                    <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row border p-2">
                            <div class="col-lg-3 mb-3">

                                <img src="<?php echo e($cartItem->getProduct()->getImagePublicPath()); ?>"
                                     width="<?php echo e($cartItem->getProduct()->getImageWidth()); ?>"
                                     alt="<?php echo e($cartItem->getProduct()->getImageAlt()); ?>">
                            </div>
                            <div class="col-lg-4 ">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h5 class="card-title"><?php echo e($cartItem->getProductName()); ?></h5>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <p class="card-text"><?php echo e($cartItem->getProduct()->getDescription()); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="card-text .text-muted">
                                            Категория: <?php echo e($cartItem->getCategoryName()); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <?php if($cartItem->getSubtotalAmount() !== $cartItem->getAmount()): ?>
                                    <div class="row">
                                        <del><?php echo e($cartItem->getSubtotalAmountDecorated()); ?>&nbsp;₽</del>
                                    </div>
                                    <div class="row">
                                        <?php echo e($cartItem->getAmount()); ?> ₽
                                    </div>
                                <?php endif; ?>
                                <?php if($cartItem->getSubtotalAmount() === $cartItem->getAmount()): ?>
                                    <div class="row">
                                        <?php echo e($cartItem->getAmountDecorated()); ?> ₽
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="input-group mb-3">
                                        <div class="col-lg-4">
                                            <?php echo e(Form::open(['url' => route('shop.cart.edit')])); ?>

                                            <?php echo e(Form::hidden('cart_item_id',$cartItem->getKey())); ?>

                                            <?php echo e(Form::hidden('quantity', $cartItem->getQuantity()-1)); ?>

                                            <button class="btn btn-danger" type="submit" id="button-addon2">-</button>
                                            <?php echo e(Form::close()); ?>

                                        </div>
                                        <div class="col-lg-4">
                                            <?php echo e(Form::open(['url' => route('shop.cart.edit'), 'id' => 'form_id'.$cartItem->getKey()])); ?>

                                            <input type="number"
                                                   name="quantity"
                                                   onchange="document.getElementById('form_id<?php echo e($cartItem->getKey()); ?>').submit()"
                                                   class="form-control"
                                                   value="<?php echo e($cartItem->getQuantity()); ?>"
                                                   placeholder="Кол-во"
                                                   min="1"
                                                   max="<?php echo e($cartItem->getProduct()->getQuantity()); ?>"
                                                   aria-describedby="button-addon2">
                                            <?php echo e(Form::hidden('cart_item_id',$cartItem->getKey())); ?>

                                            <?php echo e(Form::close()); ?>

                                        </div>
                                        <div class="col-lg-4">
                                            <?php echo e(Form::open(['url' => route('shop.cart.edit')])); ?>

                                            <?php echo e(Form::hidden('cart_item_id',$cartItem->getKey())); ?>

                                            <?php echo e(Form::hidden('quantity', $cartItem->checkQuantityInStorage())); ?>

                                            <button class="btn btn-success" type="submit" id="button-addon2">+</button>
                                            <?php echo e(Form::close()); ?>

                                            <?php echo e(Form::close()); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php echo e(Form::open(['url' => route('shop.cart.remove'), 'method' => 'POST'])); ?>

                                    <?php echo e(Form::hidden('cart_item_id',$cartItem->getKey())); ?>

                                    <button type="submit">Убрать</button>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                <?php if(empty($cartItems)): ?>
                    Корзина пуста
                <?php endif; ?>
            </div>
            <div class="col-lg-3 border ml-12">
                <div class="row">
                    <h4>Итог</h4>
                    <div class="p-2">

                        <?php if(isset($cartItems)): ?>
                            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mb-3">
                                    <div class="col-lg-4">х<?php echo e($cartItem->getQuantity()); ?></div>
                                    <div class="col-lg-4"><?php echo e($cartItem->getProduct()->getName()); ?></div>
                                    <div
                                            class="col-lg-4 <?php echo e($cartItem->getProduct()->getSale()===0 ? '' : 'text-danger'); ?>">
                                        <?php echo e($cartItem->getProduct()->getSale()===0 ? $cartItem->getTotalAmountDecorated() : $cartItem->getTotalAmount()); ?>

                                        ₽
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if(empty($cartItems)): ?>
                            Корзина пуста
                        <?php endif; ?>
                        <div>
                            <h5>Сумма: <?php echo e($cart->getDecoratedTotalAmount()); ?> ₽</h5>
                            <h6>Сумма без скидки: <?php echo e($cart->getDecoratedSubTotalAmount()); ?> ₽</h6>
                            <h7>Скидка составила: <?php echo e($cart->getDecoratedTotalSale()); ?> ₽</h7>
                        </div>
                        <?php echo e(Form::open(['method'=>'POST', 'url' => route('shop.cart.addcoupon'), 'id' => 'form_id'])); ?>

                        <div class="mt-4">
                            <?php echo $__env->make('components.inputs.input',[
                                     'name' => 'coupon_name',
                                     'label' => 'Промокод',
                                    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <button type="submit" class="btn btn-secondary">Ввести промокод</button>
                            <?php echo e(Form::close()); ?>

                        </div>

                    </div>
                </div>
                <div class="row mt-4 border">
                    <?php if(isset($coupons)): ?>
                        <div class="row">
                            <div class="col-4">
                                Купон
                            </div>
                            <div class="col-3">
                                Cкидка
                            </div>
                            <div class="col-2">

                            </div>
                        </div>
                        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <?php echo e($coupon->getName()); ?>

                                </div>
                                <div class="col-3">
                                    <?php echo e($coupon->pivot->value); ?>₽
                                </div>
                                <div class="col-2">


                                    <?php echo e(Form::open(['url' => route('shop.cart.removecoupon'), 'id' => 'form_id'.$coupon->getKey()])); ?>


                                    <button type="submit" class="btn btn-secondary mb-3">Отменить</button>
                                    <?php echo e(Form::hidden('coupon_name',$coupon->getName())); ?>

                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
                </div>
            </div>
        </div>


    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/porenti/Documents/php/resources/views/carts/index.blade.php ENDPATH**/ ?>