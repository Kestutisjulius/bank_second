<?php
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
use Bank\App;
require __DIR__.'./top.php';

?>
<div class="container">
    <div class="create">
        <form name="create" method="post" action="">
            <label for="fname">first name: </label>
            <input name="fname" type="text" class="form-control">
            <label for="lname">last name: </label>
            <input name="lname" type="text" class="form-control" >

            <label for="email">email: </label>
            <input name="email" type="email" class="form-control" >

            <label for="Male">Male: </label>
            <input name="gender" type="radio"  value="Male"  >
            <label for="Female">Female: </label>
            <input name="gender" type="radio"  value="Female"  >

            <label for="ip">ip address: </label>
            <input name="ip" type="text" class="form-control" >
            <label for="cc">credit Card: </label>
            <input name="cc" type="text" class="form-control" >
            <label for="currency">currency: </label>
            <input name="currency" type="txt" class="form-control" >
            <label for="ccc">currency code: </label>
            <input name="ccc" type="txt" class="form-control" >
            <label for="money" style="width: 180px">Money in current currency: </label>
            <input name="money" type="number" class="form-control" style="width: 275px; margin-left: 80px">
            <label for="avatar">Avatar: </label>
            <input name="avatar" type="text" class="form-control" value="<?= null ?? 'https:\/\/robohash.org\/velitfacerelibero.png?size=50x50&set=set1'?>" style="width: 405px; margin-left: -50px">

            <div class="btn-login">
                <button type="submit"><strong>save</strong></button>
            </div>

        </form>
    </div>
</div>
<?php
require __DIR__.'./bottom.php';