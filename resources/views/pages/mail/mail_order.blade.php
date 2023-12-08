<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        p {
            font-size: 16px;
            color: #333;
        }

        h2 {
            color: #444;
        }

        a {
            padding: 10px 25px;
            color: white;
            text-decoration: none;
            display: inline-block;
            margin: 10px 0;
            border-radius: 5px;
        }

        thead {
            background-color: #4caf50;
            color: white;
        }

        thead th {
            padding: 10px;
        }

        td,
        th {
            text-align: left;
            padding: 8px;
            border: 1px solid #ccc;

        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .shoping__cart__item {
            align-items: center;
        }

        .shoping__cart__price,
        .shoping__cart__total {
            color: #888;
        }

        .shoping__cart__item h5 {
            margin: 0;
            color: #333;
        }

        .buttons_added {
            display: flex;
            align-items: center;
        }

        .input-qty {
            width: 50px;
            padding: 5px;
            margin: 0 5px;
            border: 1px solid #ddd;
        }

        .shoping__cart__table {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div style="text-align: center">
            <p>Đây là email tự động, Vui lòng không trả lời lại mail này</p>
            <p>Cảm ơn bạn đã đặt hàng tại hệ thống website của chúng tôi, 
            vui lòng kiểm tra lại thông tin và nhấn vào nút xác nhận đơn hàng </p>
            </p>
        </div>

        <div class="shoping__cart__table">
            {{-- lấy ra những gì đã thêm vào giỏ hàng --}}
            <?php
            $content = Cart::content();
            ?>
            {{-- --}}
            <table>
                <thead>
                    <tr>
                        <th class="shoping__product">Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="shoping__cart__item">
                            {{($v_content->name)}}
                        </td>
                        <td class="shoping__cart__price">
                            {{number_format($v_content->price).' '.'VNĐ'}}
                        </td>
                        <td class="shoping__cart__quantity">
                            <form action="{{URL::to('/update-cart')}}" method="POST">
                                {{csrf_field()}}
                                <div class="buttons_added">
                                    <input name="cart_quantity" class="input-qty" max="99" min="1" type="number" value="{{$v_content->qty}}" />
                                </div>
                            </form>
                        </td>
                        <td class="shoping__cart__total">
                            <?php
                            $subtotal = $v_content->price * $v_content->qty;
                            echo number_format($subtotal) . ' ' . 'VNĐ'
                            ?>
                        </td>
                        
                        @endforeach
                      
                            
                        
                    </tr>

                </tbody>
            </table>

                             <?php
                            $total=Cart::subtotal(0);
                            echo '<p>Thành tiền: '.$total . ' ' . 'VNĐ</p>'
                            ?>


        </div>
        <a href="{{route('accept.order')}}" style="background-color: #CCF381;">Xác nhận</a>
    </div>
 

</body>

</html>