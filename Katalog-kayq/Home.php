<?php 
include "config.php";
include "templates/header.php";
include "classes/Product.php";
?>

<main>
<h2 style="text-align:center; color:#f91d68; font-size: 40px; margin-top: 0px;">All Products</h2>

<div class="products-grid" id="products-grid">
<?php
$product = new Product($conn);
$products = $product->getAll();

$allProducts = [];
while($row = $products->fetch_assoc()){
    $allProducts[] = $row;
}

?>
</div>

<button class="load-more-btn" id="loadMoreBtn">Load More</button>

<script>
const allProducts = <?php echo json_encode($allProducts); ?>;
let currentIndex = 0;
const grid = document.getElementById('products-grid');
const btn = document.getElementById('loadMoreBtn');

function getLimit() {
    const w = window.innerWidth;
    if(w >= 768) return 8;
    return 4;
}

function renderProducts(limit){
    const end = currentIndex + limit;
    for(let i=currentIndex; i<end && i<allProducts.length; i++){
        const p = allProducts[i];
        const div = document.createElement('div');
        div.classList.add('product');
        div.innerHTML = `
            <img src="uploads/${p.image}" width="150"><br>
            <b>${p.title}</b><br>
            Brand: ${p.brand}<br>
            Price: ${p.price} դրամ<br>
            Color: ${p.color}<br>
            <p>${p.description}</p>
        `;
        grid.appendChild(div);
    }
    currentIndex += limit;
    if(currentIndex >= allProducts.length){
        btn.style.display = 'none';
    }
}

renderProducts(getLimit());

btn.addEventListener('click', function(){
    renderProducts(getLimit());
});

window.addEventListener('resize', function(){
    
});
</script>

</main>

<?php include "templates/footer.php"; ?>
