// Lista rápida de productos
const products = [
    { nombre: "Elden Ring", precio: 1199, img: "https://i.imgur.com/qe7RzQh.jpeg" },
    { nombre: "GTA V", precio: 499, img: "https://i.imgur.com/nI0CwzP.jpeg" },
    { nombre: "Minecraft", precio: 299, img: "https://i.imgur.com/CzXTtJV.jpeg" },
    { nombre: "God of War", precio: 899, img: "https://i.imgur.com/zIrPZML.jpeg" }
];

const productList = document.getElementById("productList");

products.forEach(p => {
    const card = document.createElement("div");
    card.className = "card";

    card.innerHTML = `
        <img src="${p.img}" alt="${p.nombre}">
        <h3>${p.nombre}</h3>
        <p class="price">$${p.precio} MXN</p>
        <button onclick="addToCart('${p.nombre}')">Agregar al carrito</button>
    `;

    productList.appendChild(card);
});

function addToCart(product) {
    alert("Added: " + product);
}