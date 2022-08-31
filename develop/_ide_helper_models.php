<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category filter(array $frd)
 * @method static \Illuminate\Database\Eloquent\Builder|Category filterDeleted()
 * @method static \Illuminate\Database\Eloquent\Builder|Category filterSearch(string $value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Gender
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $short_name
 * @method static \Illuminate\Database\Eloquent\Builder|Gender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Gender extends \Eloquent {}
}

namespace App\Models\Images{
/**
 * App\Models\Images\Image
 *
 * @property int $id
 * @property string $imagable_type
 * @property int $imagable_id
 * @property string $local_path
 * @property string $public_path
 * @property string $name
 * @property string $mime_type
 * @property string $alt
 * @property int $size
 * @property int $width
 * @property int $height
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Model|\Eloquent $imagable
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImagableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereImagableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereLocalPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image wherePublicPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereWidth($value)
 * @mixin \Eloquent
 */
	class Image extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Permission extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $description
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property float $priceWithDiscount
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|Image[] $images
 * @property-read int|null $images_count
 * @method static Builder|Product filter(array $frd)
 * @method static Builder|Product filterDeleted()
 * @method static Builder|Product filterProduct(string $value)
 * @method static Builder|Product newModelQuery()
 * @method static Builder|Product newQuery()
 * @method static \Illuminate\Database\Query\Builder|Product onlyTrashed()
 * @method static Builder|Product query()
 * @method static Builder|Product whereCategoryId($value)
 * @method static Builder|Product whereCreatedAt($value)
 * @method static Builder|Product whereDeletedAt($value)
 * @method static Builder|Product whereDescription($value)
 * @method static Builder|Product whereId($value)
 * @method static Builder|Product whereName($value)
 * @method static Builder|Product wherePrice($value)
 * @method static Builder|Product wherePriceWithDiscount($value)
 * @method static Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Product withoutTrashed()
 * @mixin \Eloquent
 */
	class Product extends \Eloquent implements \App\Interfaces\Images\Imagable {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @method static \Illuminate\Database\Eloquent\Builder|Role filter(array $frd)
 * @method static \Illuminate\Database\Eloquent\Builder|Role filterSearch(string $value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\Address
 *
 * @property int $id
 * @property int $country_id
 * @property int $region_id
 * @property int $city_id
 * @property int $street_id
 * @property int $house_id
 * @property string $room
 * @property-read \App\Models\Shop\AddressCity|null $addressCity
 * @property-read \App\Models\Shop\AddressCountry|null $addressCountry
 * @property-read \App\Models\Shop\AddressHouse|null $addressHouse
 * @property-read \App\Models\Shop\AddressRegion|null $addressRegion
 * @property-read \App\Models\Shop\AddressStreet|null $addressStreet
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereHouseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereRoom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereStreetId($value)
 * @mixin \Eloquent
 */
	class Address extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\AddressCity
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCity whereName($value)
 * @mixin \Eloquent
 */
	class AddressCity extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\AddressCountry
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressCountry whereName($value)
 * @mixin \Eloquent
 */
	class AddressCountry extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\AddressHouse
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressHouse whereName($value)
 * @mixin \Eloquent
 */
	class AddressHouse extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\AddressRegion
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressRegion whereName($value)
 * @mixin \Eloquent
 */
	class AddressRegion extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\AddressStreet
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet query()
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AddressStreet whereName($value)
 * @mixin \Eloquent
 */
	class AddressStreet extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\Cart
 *
 * @property int $id
 * @property int $session_id
 * @property int $purchase_detail_id
 * @property string|null $canceled_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Shop\PurchaseDetail $purchaseDetail
 * @property-read \App\Models\Shop\Session $session
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCanceledAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart wherePurchaseDetailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSessionId($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Cart filterNotCanceled()
 */
	class Cart extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\CartItem
 *
 * @property int $id
 * @property int $cart_id
 * @property int $purchase_item_detail_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Shop\Cart $cart
 * @property-read \App\Models\Shop\PurchaseItemDetail $purchaseItemDetail
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartItem wherePurchaseItemDetailId($value)
 * @mixin \Eloquent
 */
	class CartItem extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\Delivery
 *
 * @property int $id
 * @property string $name
 * @property int $price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\PaymentMethod[] $paymentMethod
 * @property-read int|null $payment_method_count
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Delivery wherePrice($value)
 * @mixin \Eloquent
 */
	class Delivery extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\Order
 *
 * @property int $id
 * @property int $cart_id
 * @property int $purchase_detail_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Shop\Cart $cart
 * @property-read \App\Models\Shop\PurchaseDetail $purchaseDetail
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePurchaseDetailId($value)
 * @mixin \Eloquent
 */
	class Order extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\OrderItem
 *
 * @property int $id
 * @property int $order_id
 * @property int $cart_item_id
 * @property int $purchase_item_detail_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Shop\CartItem $cartItem
 * @property-read \App\Models\Shop\Order $order
 * @property-read \App\Models\Shop\PurchaseItemDetail $purchaseItemDetail
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCartItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderItem wherePurchaseItemDetailId($value)
 * @mixin \Eloquent
 */
	class OrderItem extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\OrderStatus
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereName($value)
 * @mixin \Eloquent
 */
	class OrderStatus extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\OrderStatusHistory
 *
 * @property int $id
 * @property int $order_id
 * @property int $order_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property-read \App\Models\Shop\Order $order
 * @property-read \App\Models\Shop\OrderStatus $orderStatus
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusHistory whereOrderStatusId($value)
 * @mixin \Eloquent
 */
	class OrderStatusHistory extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\PaymentMethod
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Delivery[] $delivery
 * @property-read int|null $delivery_count
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentMethod whereName($value)
 * @mixin \Eloquent
 */
	class PaymentMethod extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\PurchaseDetail
 *
 * @property int $id
 * @property int $user_id
 * @property int $delivery_id
 * @property int $address_id
 * @property int $payment_method_id
 * @property int $subtotal_amount
 * @property int $total_amount
 * @property int $total_sale
 * @property int $delivery_price
 * @property-read \App\Models\Shop\Address $address
 * @property-read \App\Models\Shop\Delivery $delivery
 * @property-read \App\Models\Shop\PaymentMethod $paymentMethod
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereDeliveryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereDeliveryPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail wherePaymentMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereSubtotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereTotalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereTotalSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetail whereUserId($value)
 * @mixin \Eloquent
 */
	class PurchaseDetail extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\PurchaseItemDetail
 *
 * @property int $id
 * @property int $product_id
 * @property int $quantity
 * @property int $sale
 * @property int $subtotal_amount
 * @property int $amount
 * @property-read Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseItemDetail whereSubtotalAmount($value)
 * @mixin \Eloquent
 */
	class PurchaseItemDetail extends \Eloquent {}
}

namespace App\Models\Shop{
/**
 * App\Models\Shop\Session
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property string|null $expired_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Session query()
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Session whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Cart[] $carts
 * @property-read int|null $carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Cart[] $notCanceledCarts
 * @property-read int|null $not_canceled_carts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Cart[] $notCanceledLastCart
 * @property-read int|null $not_canceled_last_cart_count
 */
	class Session extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $nickname
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property int $gender_id
 * @property string $description
 * @property int $age
 * @property bool $hide
 * @property string|null $hide_time
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Gender $gender
 * @property-read \Illuminate\Database\Eloquent\Collection|Image[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static Builder|User filter(array $frd)
 * @method static Builder|User filterFio(string $fioString)
 * @method static Builder|User filterHide()
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User orWherePermissionIs($permission = '')
 * @method static Builder|User orWhereRoleIs($role = '', $team = null)
 * @method static Builder|User query()
 * @method static Builder|User whereAge($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDescription($value)
 * @method static Builder|User whereDoesntHavePermission()
 * @method static Builder|User whereDoesntHaveRole()
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereGenderId($value)
 * @method static Builder|User whereHide($value)
 * @method static Builder|User whereHideTime($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereMiddleName($value)
 * @method static Builder|User whereNickname($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePermissionIs($permission = '', $boolean = 'and')
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereRoleIs($role = '', $team = null, $boolean = 'and')
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent implements \App\Interfaces\Images\Imagable {}
}

