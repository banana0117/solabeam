<?php
/*

- 데이터

DB -> wp_woocommerce_order_items

-> query : order_id = '정기결제번호'

Result = 'order_item_id'

DB -> wp-woocommerce_order_itemmeta

-> query : order_item_id = '위항목결과'

Result = '항목=제품명'

'_product_id:상품번호'

'_qty:갯수'

'_line_subtotal:갱신금액'

'_line_total:갱신금액'

::> 위 결과값을 변경해야함

DB -> wp_postmeta 

-> query : post_id = '정기결제번호'

Result = '_order_total:갱신금액'

::> 이것도 같이 변경해야함

---------------------------

구매방식변경 -> 결제페이지 단일화시

DB -> wp_woocommerce_order_items 에서

옵션명, fee 인것 -> order_item_id -> & meta_key[_fee_amount, _line_total] 가격 바꿔야함

* 옵션 줄추가 하는법

DB -> wp_woocommerce_order_items 에서

order_item_id , order_item_name, order_item_type, order_id 배열로 삽입

이후  DB -> wp_woocommerce_order_itemmeta 에서

order_item_id로된 meta_id(숫자증가) 5개 데이터형 필요 meta_key[_fee_amount, _tax_class, _tax,status, _line_total, _line_tax, _line_tax_data] 

_line_tax_data => a:1:{s:5:"total";a:0:{}} 고정형

*/

