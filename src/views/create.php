<?php
echo 'create';
/** {
 * "id":7,
 * "first_name":"Shermas",
 * "last_name":"Woollett",
 * "email":"swoollett6@ning.com",
 * "gender":"Male",
 * "ip_address":"125.36.11.85",
 * "credit_card":"KW23 EWQE PXE8 F54W 7MPM EFYQ CS2M CQ",
 * "currency":"Peso",
 * "currency_code":"PHP",
 * "money":"\u20ac468,78",
 * "avatar":"https:\/\/robohash.org\/velitfacerelibero.png?size=50x50&set=set1"}
 */
?>
<div class="container">
    <div class="login">


        <form name="create" method="post" action="">
            <label for="fname">first name: </label>
            <input name="fname" type="text" class="form-control" >
            <label for="lname">last name: </label>
            <input name="lname" type="text" class="form-control" >
            <label for="email">email: </label>
            <input name="email" type="email" class="form-control" >
            <label for="ip">ip address: </label>
            <input name="ip" type="text" class="form-control" >
            <label for="cc">credit Card: </label>
            <input name="cc" type="text" class="form-control" >
            <label for="currency">currency: </label>
            <input name="currency" type="txt" class="form-control" >
            <label for="ccc">currency code: </label>
            <input name="ccc" type="txt" class="form-control" >

            <div class="btn-login">
                <button type="submit"><strong>save</strong></button>
            </div>
            <input type="hidden" name="csrf" value="<?=App::csrf()?>">
        </form>
    </div>
</div>