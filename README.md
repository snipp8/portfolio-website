# Syahin Bahar — Portfolio

A personal portfolio website showcasing web design and software engineering projects. Built as a fully responsive static website with HTML, CSS, JavaScript, and Bootstrap 5.

## 🚀 Features
- **Modern UI/UX**: Clean layout using a harmonious color palette, custom styling, and modern typography.
- **Dark Mode**: Smooth transition between light and dark modes, remembering preference via `localStorage`.
- **Responsive Layout**: Fluid experience optimized for all screen sizes (mobile, tablet, desktop).
- **Interactive Case Studies**: Modals showing comprehensive project overviews, design decisions, and wireframe comparisons.
- **GitHub Pages Ready**: Optimized URL structure and configurations for hassle-free static hosting.

---

## 📂 Project Structure

```text
portfolio/
├── assets/
│   ├── docs/            # PDF documents (e.g., SYAHIN-resume.pdf)
│   └── images/          # Profile photos, icons, and project assets
├── css/
│   └── style.css        # Main stylesheet (including theme variables & custom components)
├── js/
│   └── script.js        # Core JavaScript (theme toggle, local storage state persistence)
├── project/
│   └── index.html       # Projects gallery & case studies
├── index.html           # Home / About Me page
├── .gitignore
└── README.md
```

---

## 🛠️ Local Development

Since the site uses directory-root navigation (`./` and `../`) to maintain clean URLs, it is recommended to run a simple local web server to preview changes.

### Option 1: Using Python (Recommended)
Open your terminal in the project root directory and run:
```bash
python -m http.server 8000
```
Then visit: `http://localhost:8000`

### Option 2: Using Node.js (npx)
If you have Node.js installed, run:
```bash
npx serve
```
Then visit the local server address shown in your terminal (usually `http://localhost:3000`).

---

## 🌐 Deployment to GitHub Pages

1. Push your latest code to your repository:
   ```bash
   git add .
   git commit -m "Your commit message"
   git push origin main
   ```
2. Navigate to your repository page on GitHub.
3. Click **Settings** (top menu) -> **Pages** (left sidebar).
4. Under **Build and deployment**, select **Deploy from a branch** and set the branch to `main` (`/ (root)`).
5. Click **Save**.

---

## 🧰 Tech Stack
- **HTML5 & CSS3** (Custom design tokens, variables, & transitions)
- **Bootstrap 5.3** (Grid layout, utilities, and components like Modals)
- **Vanilla JavaScript** (Theme toggle logic and local storage)
