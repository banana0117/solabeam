<?php
// functions.php 에 보면 이 파트가 있을텐데 그부분 지워주고 이걸 넣어주시면 됩니다
// YJ 다음우편번호검색
add_filter( 'woocommerce_checkout_fields' , 'checkout_fields_postcode_lookup' ,9999);
function checkout_fields_postcode_lookup( $fields ) {
$fields['billing']['billing_postcode']['label'] = '<label style="width:100%;">도로명주소</label><input type="button" id="billing_postcode_search" value="우편번호 검색" class="btn" onclick="openDaumPostcode();" style="display:inline-block; width:50%;">';
return $fields; }

//주소검색창불러오기
add_action('init','postcode_lookup_load');
function postcode_lookup_load() {
wp_enqueue_script('daum_postcode_woocommerce', '//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js',array(),null,false);
}

add_action( 'wp_enqueue_scripts', 'wp_enqueue_scripts_postcode_lookup' );

//주소클릭시하단인풋에추가하는함수
function wp_enqueue_scripts_postcode_lookup() {
?>
<script type="text/javascript">
    //주소넣기
    function openDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                document.getElementById('billing_postcode').value = data.zonecode;
                document.getElementById('billing_address_1').value = data.address;
                document.getElementById('billing_address_2').focus();
            }
        }).open();
    }

    function openDaumPostcode2() {
        new daum.Postcode({
            oncomplete: function(data) {
                document.getElementById('shipping_postcode').value = data.zonecode;
                document.getElementById('shipping_address_1').value = data.address;
                document.getElementById('shipping_address_2').focus();
            }
        }).open();
    }

    function openDaumPostcode5() {
        new daum.Postcode({
            oncomplete: function(data) {
                document.getElementById('detail_new_postcode').value = data.zonecode;
                document.getElementById('detail_new_post').value = data.address;
                document.getElementById('detail_new_sidepost').focus();
            }
        }).open();
    }

function openDaumPostcode3() {
        new daum.Postcode({
            oncomplete: function(data) {
                document.getElementById('addpostcode').value = data.zonecode;
                document.getElementById('addaddress_1').value = data.address;
                document.getElementById('addaddress_2').focus();
            }
        }).open();
    }
</script>
<?php
}