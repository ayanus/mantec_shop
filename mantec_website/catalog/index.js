var product = [];
var currentPage = 1;
var itemsPerPage = 8;

$(document).ready(() => {
  $.ajax({
    method: 'get',
    url: './api/getallproduct.php',
    success: function(response) {
      if (response.RespCode == 200) {
        product = response.Result;
        renderPage(currentPage);  // Render the first page when the page loads
      }
    },
    error: function(err) {
      console.log(err);
    }
  });
});

function renderPage(page) {
  var start = (page - 1) * itemsPerPage;
  var end = start + itemsPerPage;
  var paginatedProducts = product.slice(start, end);

  var html = '';
  for (let i = 0; i < paginatedProducts.length; i++) {
    html += `<div onclick="openProductDetail(${i + start})" class="product-items ${paginatedProducts[i].type}">
                <img class="product-img" src="admin/upload/product/${paginatedProducts[i].img}" alt="">
                <p style="font-size: 1.2vw;">${paginatedProducts[i].name}</p>
                <p style="font-size: 1vw;">${ numberWithCommas(paginatedProducts[i].price) } THB</p>
             </div>`;
  }

  if (html === '') {
    $("#productlist").html('<p>No products found</p>');
  } else {
    $("#productlist").html(html);
  }
  updatePageInfo();
}

  // Set the number of products per page

function updatePageInfo() {
  var totalPages = Math.ceil(product.length / itemsPerPage);
  $("#pageInfo").text(`Page ${currentPage} of ${totalPages}`);
}

function nextPage() {
  var totalPages = Math.ceil(product.length / itemsPerPage);
  if (currentPage < totalPages) {
    currentPage++;
    renderPage(currentPage);
  }
}

function prevPage() {
  if (currentPage > 1) {
    currentPage--;
    renderPage(currentPage);
  }
}

function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
}

function searchsomething(elem) {
    // console.log('#'+elem.id)
    var value = $('#'+elem.id).val()
    console.log(value)

    var html = '';
    for (let i = 0; i < product.length; i++) {
        if( product[i].name.includes(value) ) {
            html += `<div onclick="openProductDetail(${i})" class="product-items ${product[i].type}">
                    <img class="product-img" src="admin/upload/product/${product[i].img}" alt="">
                    <p style="font-size: 1.2vw;">${product[i].name}</p> 
                    <p stlye="font-size: 1vw;">${ numberWithCommas(product[i].price) } THB</p>
                </div>`;
        }
    }
    if(html == '') {
        $("#productlist").html(`<p>Not found product</p>`);
    } else {
        $("#productlist").html(html);
    }
}

function searchproduct(param) {
    console.log(param)
    $(".product-items").css('display', 'none') 

    if(param == 'all') {
        $(".product-items").css('display', 'block')
    }
    else {
        $("."+param).css('display', 'block') 
       
    }
}

var productindex = 0;
function openProductDetail(index) {
    productindex = index;
    console.log(productindex)
    $("#modalDesc").css('display', 'flex')
    $("#mdd-img").attr('src', 'admin/upload/product/' + product[index].img);
    $("#mdd-name").text(product[index].name)
    $("#mdd-price").text( numberWithCommas(product[index].price) + ' THB')
    $("#mdd-desc").text(product[index].description)
    $("#mdd-type").text(product[index].type)
}

function closeModal() {
    $(".modal").css('display','none')
}

var cart = [];
function addtocart() {
    var pass = true;

    for (let i = 0; i < cart.length; i++) {
        if( productindex == cart[i].index ) {
            console.log('found same product')
            cart[i].count++;
            pass = false;
        }
    }

    if(pass) {
        var obj = {
            index: productindex,
            id: product[productindex].id,
            name: product[productindex].name,
            price: product[productindex].price,
            img: product[productindex].img,
            count: 1
        };
        // console.log(obj)
        cart.push(obj)
    }
    console.log(cart)

    Swal.fire({
        icon: 'success',
        title: 'Add ' + product[productindex].name + ' to cart !'
    })
    $("#cartcount").css('display','flex').text(cart.length)
}

function openCart() {
    $('#modalCart').css('display','flex')
    rendercart();
}

function rendercart() {
    if(cart.length > 0) {
        var html = '';
        for (let i = 0; i < cart.length; i++) {
            html += `<div class="cartlist-items">
                        <div class="cartlist-left">
                            <img src="admin/upload/product/${cart[i].img}" alt="">
                            <div class="cartlist-detail">
                                <p style="font-size: 1.5vw;">${cart[i].name}</p>
                                <p style="font-size: 1.2vw;">${ numberWithCommas(cart[i].price * cart[i].count) } THB</p>
                            </div>
                        </div>
                        <div class="cartlist-right">
                            <p onclick="deinitems('-', ${i})" class="btnc">-</p>
                            <p id="countitems${i}" style="margin: 0 20px;">${cart[i].count}</p>
                            <p onclick="deinitems('+', ${i})" class="btnc">+</p>
                        </div>
                    </div>`;
        }
        $("#mycart").html(html)
    }
    else {
        $("#mycart").html(`<p>Not found product list</p>`)
    }
}

function deinitems(action, index) {
    if(action == '-') {
        if(cart[index].count > 0) {
            cart[index].count--;
            $("#countitems"+index).text(cart[index].count)

            if(cart[index].count <= 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Are you sure to delete?',
                    showConfirmButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel'
                }).then((res) => {
                  if(res.isConfirmed) {
                     cart.splice(index, 1) 
                     console.log(cart)
                     rendercart();
                     $("#cartcount").css('display','flex').text(cart.length)
                     
                     if(cart.length <= 0) {
                        $("#cartcount").css('display','none')
                     }
                  }  
                  else {
                    cart[index].count++;
                    $("#countitems"+index).text(cart[index].count)
                  }
                })
            }
        }
    }
    else if(action == '+') {
        cart[index].count++;
        $("#countitems"+index).text(cart[index].count)
    }
}

function buynow() {
    $.ajax({
        method: 'post',
        url: './api/buynow.php',
        data: {
            product: cart
        },
        success: function(response) {
            console.log(response);
            if (response.RespCode == 200) {
                // แสดงข้อมูลผู้ซื้อและรายการสินค้า
                let productListHtml = `<ul>`;
                response.ProductList.forEach(item => {
                    productListHtml += `<li>${item.name} x ${item.count} - ${numberWithCommas(item.price * item.count)} THB</li>`;
                });
                productListHtml += `</ul>`;

                // แสดงผลข้อมูลทั้งหมดใน SweetAlert
                Swal.fire({
                    icon: 'success',
                    title: 'Thank you for your purchase!',
                    html: `
                        <p><strong>ชื่อผู้ซื้อ:</strong> ${response.BuyerName}</p>
                        <p><strong>ราคารวม:</strong> ${numberWithCommas(response.Amount.Amount)} THB</p>
                        <p><strong>ค่าจัดส่ง:</strong> ${numberWithCommas(response.Amount.Shipping)} THB</p>
                        <p><strong>รายการสินค้า:</strong> ${productListHtml}</p>
                        <p>กรุณากดยืนยันเพื่อตรวจสอบรายการสินค้า</p>
                    `,
                    showConfirmButton: true,
                    confirmButtonText: 'Confirm'
                }).then((res) => {
                    if (res.isConfirmed) {
                        cart = [];
                        closeModal();
                        $("#cartcount").css('display','none');
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Something went wrong!',
                    text: 'Unable to process your order.'
                });
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
}


