<head>
    <style>
        .theme-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;

        width: 55px;
        height: 55px;
        border-radius: 50%;

        border: none;
        background-color: #0d6efd;
        color: white;
        font-size: 20px;

        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
        }

        .theme-btn:hover {
        transform: scale(1.1);
        background-color: #084298;
        }
    </style>
</head>

<button id="themeToggle" onclick="toggleTheme()" class="theme-btn">
  🌙
</button>

<script>
function toggleTheme() {
  const html = document.documentElement;
  const theme = html.getAttribute("data-bs-theme");

  if (theme === "dark") {
    html.setAttribute("data-bs-theme", "light");
    document.getElementById("themeToggle").innerHTML = "🌙";
  } else {
    html.setAttribute("data-bs-theme", "dark");
    document.getElementById("themeToggle").innerHTML = "☀️";
  }
}
</script>
