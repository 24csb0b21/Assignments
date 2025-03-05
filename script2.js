class Product {
    constructor(id, name, price, image) {
        this.id = id;
        this.name = name;
        this.price = price;
        this.image = image;
    }
}

class Cart {
    constructor() {
        this.items = [];
    }

    addItem(product) {
        this.items.push(product);
        this.displayCart();
    }

    removeItem(productId) {
        this.items = this.items.filter(item => item.id !== productId);
        this.displayCart();
    }

    displayCart() {
        const cartContainer = document.getElementById("cart-container");
        cartContainer.innerHTML = '';

        if (this.items.length === 0) {
            cartContainer.innerHTML = "<p>No items in cart</p>";
        } else {
            this.items.forEach(item => {
                const cartItem = document.createElement('div');
                cartItem.textContent = `${item.name} - $${item.price.toFixed(2)}`;
                cartItem.addEventListener('click', () => this.removeItem(item.id));
                cartContainer.appendChild(cartItem);
            });

            const total = this.items.reduce((sum, item) => sum + item.price, 0);
            const totalElement = document.createElement('div');
            totalElement.textContent = `Total: $${total.toFixed(2)}`;
            cartContainer.appendChild(totalElement);
        }
    }
}

const products = [
    new Product(1, "Camera", 80, "https://media.istockphoto.com/id/185278433/photo/black-digital-slr-camera-in-a-white-background.jpg?s=612x612&w=0&k=20&c=OOCbhvOF0W-eVhhrm-TxbgLfbKhFfs4Lprjd7hiQBNU="),
    new Product(2, "Grocery", 15, "https://media.gettyimages.com/id/171302954/photo/groceries.jpg?s=612x612&w=gi&k=20&c=V1rR0STPdGb4AF4N9cvx0ZjNQodolWAOVHkLDqj4ATI="),
    new Product(3,"Cycle", 25, "https://5.imimg.com/data5/SELLER/Default/2023/5/309636694/MP/ON/RU/143337214/black.jpg"),
    new Product(4, "Playpen", 45, "https://rukminim2.flixcart.com/image/850/1000/xif0q/crib-cradle/e/i/h/155-baby-playpen-16-panel-for-kids-playard-play-area-fence-with-original-imah5tdfyhdfr4zy.jpeg?q=20&crop=false")
];

const cart = new Cart();

function renderProducts() {
    const productContainer = document.getElementById("product-container");
    productContainer.innerHTML = '';

    products.forEach(product => {
        const productCard = document.createElement('div');
        productCard.classList.add('product-card');
        
        const productImage = document.createElement('img');
        productImage.src = product.image;
        productCard.appendChild(productImage);
        
        const productName = document.createElement('h3');
        productName.textContent = product.name;
        productCard.appendChild(productName);
        
        const productPrice = document.createElement('p');
        productPrice.textContent = `$${product.price.toFixed(2)}`;
        productCard.appendChild(productPrice);
        
        const addButton = document.createElement('button');
        addButton.textContent = 'Add to Cart';
        addButton.classList.add('add-to-cart');
        addButton.addEventListener('click', () => {
            cart.addItem(product);
        });
        productCard.appendChild(addButton);
        
        productContainer.appendChild(productCard);
    });
}

renderProducts();

    