PHP Video Chopping Cart

==========================

Requirements<br/>
PHP 5.4+<br/>


Integrations<br/>
Laravel 5.5+ integrations<br/>
Package Discovery<br/>
Anam\Phpcart utilize the Laravel's package auto discovery feature. So, you don't need to add manually Service provider and Facade in Laravel application's config/app.php. Laravel will automatically register the service provider and facades for you.
<br/>
<br/>
Although PHPCart is framework agnostic, it does support Laravel out of the box and comes with a Service provider and Facade for easy integration.<br/>

After you have installed the PHPCart, open the config/app.php file which is included with Laravel and add the following lines.<br/>

In the $providers array add the following service provider.<br/>

Add the facade of this package to the $aliases array.<br/>

You can now use this facade in place of instantiating the Cart yourself in the following examples.<br/>

Usage<br/>

Add Item
The add method required id, name, price and quantity keys. However, you can pass any data that your application required.

$cart = new Cart();<br/>

$cart->add([<br/>
    'id'       => 1001,<br/>
    'name'     => 'Skinny Jeans',<br/>
    'quantity' => 1,<br/>
    'price'    => 90<br/>
]);<br/>
Update Item<br/>
$cart->update([<br/>
    'id'       => 1001,<br/>
    'name'     => 'Hoodie'<br/>
]);<br/>
Update quantity<br/>
$cart->updateQty(1001, 3);<br/>
Update price<br/>
$cart->updatePrice(1001, 30);<br/>
Remove an Item<br/>
$cart->remove(1001);<br/>
Get all Items<br/>
$cart->getItems();<br/>
// or<br/>
$cart->items();<br/>
Get an Item<br/>
$cart->get(1001);<br/>
Determining if an Item exists in the cart<br/>
$cart->has(1001);<br/>
Get the total number of items in the cart<br/>
$cart->count();<br/>
Get the total quantities of items in the cart<br/>
$cart->totalQuantity();<br/>
Total sum<br/>
$cart->getTotal();<br/>
Empty the cart<br/>
$cart->clear();<br/>
Multiple carts<br/>
PHPCart supports multiple cart instances, so that you can have as many shopping cart instances on the same page as you want without any conflicts.
<br/>
$cart = new Cart('cart1');<br/>
// or<br/>
$cart->setCart('cart2');<br/>
$cart->add([<br/>
    'id'       => 1001,<br/>
    'name'     => 'Skinny Jeans',<br/>
    'quantity' => 1,<br/>
    'price'    => 90<br/>
]);
<br/>