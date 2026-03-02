# ACM Irving Professional Chapter — Website

Official website for the **ACM Irving Professional Chapter**, serving the Irving and greater Dallas–Fort Worth technology community.

🌐 **Live site:** [https://irving.acm.org](https://irving.acm.org)  
📁 **Repository:** [https://github.com/vichu/acm-irving-website](https://github.com/vichu/acm-irving-website)

---

## Table of Contents

1. [Project Overview](#project-overview)
2. [Tech Stack](#tech-stack)
3. [Prerequisites](#prerequisites)
4. [Local Development Setup](#local-development-setup)
5. [Project Structure](#project-structure)
6. [Development Workflow](#development-workflow)
7. [Deploying to Production](#deploying-to-production)
8. [WordPress Admin Guide](#wordpress-admin-guide)
9. [Design System](#design-system)
10. [Credentials & Access](#credentials--access)
11. [Troubleshooting](#troubleshooting)

---

## Project Overview

The ACM Irving website is built on **WordPress** with a fully custom child theme called `acm-irving`. All styling is organized into modular CSS files and loaded globally — meaning changes to shared styles automatically apply across every page.

The site is hosted by ACM Global at `irving.acm.org`. The WordPress admin and cPanel are accessed via IP address (see [Credentials & Access](#credentials--access)).

---

## Tech Stack

| Layer | Technology |
|---|---|
| CMS | WordPress (hosted by ACM) |
| Theme | Custom child theme (`acm-irving`) |
| Languages | PHP, CSS, JavaScript |
| Fonts | Merriweather (serif) + Source Sans 3 (sans-serif) via Google Fonts |
| Local Dev | Local by Flywheel |
| Version Control | Git + GitHub |
| Deployment | SFTP via VS Code extension |

---

## Prerequisites

Before you begin, install the following on your machine. Each item links to its download page.

| Tool | Purpose | Download |
|---|---|---|
| **VS Code** | Code editor | [code.visualstudio.com](https://code.visualstudio.com) |
| **Local by Flywheel** | Run WordPress locally on your Mac | [localwp.com](https://localwp.com) |
| **Git** | Version control | [git-scm.com](https://git-scm.com) |

### VS Code Extensions (Required)

Open VS Code and install these extensions (`Cmd+Shift+X` to open Extensions panel):

| Extension | Publisher | Purpose |
|---|---|---|
| **SFTP** | Natizyskunk | Deploy files to production server |
| **PHP Intelephense** | Ben Mewburn | PHP autocomplete |
| **Prettier** | Prettier | Auto-format code |
| **GitLens** | GitKraken | Git history in editor |

---

## Local Development Setup

Follow these steps exactly, in order.

> **The key idea:** We create the Local site first, then pull the repo directly into that same folder. This means your code editor, Git, and local WordPress all point to the **same directory** — no copying or syncing ever needed.

### Step 1 — Create a New Site in Local by Flywheel

1. Open **Local by Flywheel**
2. Click the **"+"** button (bottom left) → **"Create New Site"**
3. Fill in:
   - Site name: `acm-irving` ← must be exactly this
   - Click **"Continue"**
   - Choose **"Preferred"** environment
   - Click **"Continue"**
   - Set a WordPress username and password you'll remember
   - Click **"Add Site"**
4. Wait for Local to finish (takes ~1 minute)
5. Click **"Open Site"** to confirm WordPress loads at `http://acm-irving.local`

This creates the directory `~/Local Sites/acm-irving/` with WordPress already inside it.

### Step 2 — Pull the Repo into the Local Site Directory

Now pull the project code directly into that same Local site folder:

```bash
cd ~/Local\ Sites/acm-irving/
git init
git remote add origin git@github.com:vichu/acm-irving-website.git
git pull origin main
```

> **SSH required:** This uses SSH to authenticate with GitHub. If you get an error, see [Git push fails with authentication error](#git-push-fails-with-authentication-error) in the Troubleshooting section.

Your theme files are now live at:
```
~/Local Sites/acm-irving/app/public/wp-content/themes/acm-irving/
```

VS Code, Git, and Local by Flywheel all work from the same root folder. ✅

### Step 3 — Activate the Theme

1. In Local, click **"WP Admin"** to open the WordPress dashboard
2. Go to **Appearance → Themes**
3. Find **ACM Irving** and click **Activate**

### Step 4 — Set the Homepage

1. Go to **Settings → Reading**
2. Select **"A static page"**
3. Set **Front page** to **Home** (create a blank page called "Home" if it doesn't exist yet)
4. Click **Save Changes**

### Step 5 — Set Up Navigation Menu

1. Go to **Appearance → Menus**
2. Click **"Create a new menu"**
3. Name it `Primary Navigation`
4. Add pages: Home, About, Events, Officers, Resources, Contact
5. Under **"Menu Settings"** check **Primary Navigation**
6. Click **Save Menu**

### Step 6 — Open the Project in VS Code

Open VS Code at the **site root** (not just the theme folder):

```bash
code ~/Local\ Sites/acm-irving/
```

You should see `app/`, `conf/`, `logs/` in the VS Code sidebar.

### Step 7 — Configure SFTP for Deployment

1. In VS Code press `Cmd+Shift+P` → type **"SFTP: Config"** → press Enter
2. This creates `.vscode/sftp.json` — paste the following:

```json
{
  "name": "ACM Irving Production",
  "host": "190.92.158.4",
  "protocol": "ftp",
  "port": 21,
  "username": "irvinghosting",
  "password": "GET_FROM_CHAPTER_CHAIR",
  "context": "app/public/wp-content/themes/acm-irving",
  "remotePath": "/public_html/wp-content/themes/acm-irving",
  "uploadOnSave": false,
  "passive": true,
  "ignore": [".git", ".DS_Store", "node_modules"]
}
```

> ⚠️ Get the actual password from the chapter chair. Never commit this file to Git — it is already in `.gitignore`.

### Step 8 — Verify Everything Works

Visit `http://acm-irving.local` in your browser. You should see the ACM Irving homepage with:
- Sticky header with logo and navigation
- Hero section with blue overlay
- Purpose Pillars section
- Membership section
- Events section
- Footer with social icons

> **Note:** Images (logo, hero banner) load from the production server URLs, so they may not display locally. This is expected. They will display correctly on the live site.

---

## Project Structure

```
acm-irving/                              ← Open THIS folder in VS Code
│
├── .vscode/
│   └── sftp.json                        ← SFTP config (DO NOT COMMIT)
│
├── app/
│   └── public/                          ← WordPress root
│       └── wp-content/
│           └── themes/
│               └── acm-irving/          ← 👈 Your theme (edit files here)
│                   │
│                   ├── style.css        ← Theme declaration (required by WordPress)
│                   ├── functions.php    ← Enqueue CSS/JS, register menus
│                   ├── index.php        ← Fallback template
│                   ├── header.php       ← Site-wide header & navigation
│                   ├── footer.php       ← Site-wide footer
│                   ├── front-page.php   ← Homepage template
│                   │
│                   ├── css/
│                   │   ├── variables.css    ← ⭐ Colors, fonts, spacing — edit this to restyle everything
│                   │   ├── typography.css   ← Headings, body text, links
│                   │   ├── buttons.css      ← All button styles
│                   │   ├── header.css       ← Sticky nav styles
│                   │   ├── footer.css       ← Footer styles
│                   │   ├── layout.css       ← Sections, cards, grids
│                   │   └── responsive.css   ← All media queries (mobile/tablet)
│                   │
│                   └── js/
│                       └── main.js          ← Mobile menu toggle, smooth scroll
│
├── conf/                                ← Local by Flywheel config (don't edit)
├── logs/                                ← Local by Flywheel logs (don't edit)
├── .gitignore                           ← Excludes credentials, WP core, uploads
└── README.md                            ← You are here
```

---

## Development Workflow

### Day-to-Day Editing

```
1. Open VS Code at ~/Local Sites/acm-irving/
        ↓
2. Pull latest changes from main
        git checkout main && git pull origin main
        ↓
3. Create a new branch for your work
        git checkout -b feature/your-change
        ↓
4. Edit theme files in app/public/wp-content/themes/acm-irving/
        ↓
5. Preview changes at http://acm-irving.local (instant, no upload needed)
        ↓
6. Commit and push your branch
        git add .
        git commit -m "describe what you changed"
        git push origin feature/your-change
        ↓
7. Open a Pull Request on GitHub for review
        ↓
8. Once approved and merged, deploy to production (see below)
```

> **Never push directly to `main`.** All changes go through a Pull Request.
> See [CONTRIBUTING.md](CONTRIBUTING.md) for the full contribution guide.

### Common Edits

| What you want to change | Which file to edit |
|---|---|
| Brand colors | `css/variables.css` — edit `--blue`, `--gold` etc. |
| Font sizes | `css/variables.css` — edit `--text-*` variables |
| Navigation links | `header.php` or **WP Admin → Appearance → Menus** |
| Footer links | `footer.php` |
| Homepage content | `front-page.php` |
| Button styles | `css/buttons.css` |
| Mobile layout | `css/responsive.css` |
| Add a new page template | Create `page-templates/your-page.php` |

### Git Best Practices

Always pull before starting work to get latest changes:
```bash
git checkout main
git pull origin main
```

Always work on a branch — never commit directly to `main`:
```bash
git checkout -b feature/your-change
```

Write descriptive commit messages:
```bash
# Good
git commit -m "feat: update hero headline copy and button text"
git commit -m "feat: add About page template"
git commit -m "fix: correct mobile navigation menu overlap"

# Bad
git commit -m "update"
git commit -m "fix"
```

For the full contribution workflow including how to open a Pull Request, see [CONTRIBUTING.md](CONTRIBUTING.md).

---

## Deploying to Production

Deployment is done by the chapter chair or maintainer after a PR is merged into `main`. If you have deploy access, here's how to push changes to the live site:

### Option A — Upload Changed Files Only (Recommended for small changes)

```
Cmd+Shift+P → SFTP: Upload Changed Files
```

This only uploads files modified since the last upload — fast and safe.

### Option B — Upload Entire Theme (Use after major changes)

```
Cmd+Shift+P → SFTP: Upload Project
```

This uploads all theme files. Use when you've added new files or restructured things.

### Option C — Upload a Single File (Quickest for one-line fixes)

1. Open the file in VS Code
2. Right-click in the editor → **"SFTP: Upload Active File"**

### After Deploying

Visit [https://irving.acm.org](https://irving.acm.org) and verify your changes look correct. If something looks wrong:
1. Check the SFTP log in VS Code Output panel (`Cmd+Shift+U`)
2. Hard refresh the browser (`Cmd+Shift+R`) to clear cache

---

## WordPress Admin Guide

### Accessing the Dashboard

- **Local (development):** `http://acm-irving.local/wp-admin`
- **Production:** `https://irving.acm.org/wp-admin`

### Adding Events

Events are currently displayed as placeholder content in `front-page.php`. To add real events:

1. Go to **Posts → Add New**
2. Assign the post to the **"Events"** category
3. Fill in title, description, and set the publish date to the event date
4. Click **Publish**

The homepage will automatically pull the 3 most recent events from the Events category.

### Adding Pages

1. Go to **Pages → Add New**
2. Give it a title (e.g. "About", "Officers")
3. Add content using the WordPress block editor
4. Click **Publish**
5. Go to **Appearance → Menus** and add the new page to the navigation

### Updating Social Media Links

Social links are hardcoded in `footer.php`. To update them:

1. Open `footer.php` in VS Code
2. Find the `$socials` array near the top of the footer section
3. Replace `'#'` with the actual social media URL for each platform
4. Save and deploy

---

## Design System

All design tokens are defined in `css/variables.css`. Change a value there and it updates everywhere.

### Brand Colors

| Variable | Value | Usage |
|---|---|---|
| `--blue` | `#0062A3` | Primary blue, links, accents |
| `--blue-dark` | `#002855` | Dark navy, header text, footer bg |
| `--blue-light` | `#EEF5FB` | Light background sections |
| `--gold` | `#F7A800` | CTAs, highlights, eyebrows |
| `--gold-dark` | `#D4920A` | Gold hover state |

### Typography

| Variable | Value |
|---|---|
| `--font-serif` | Merriweather (headings) |
| `--font-sans` | Source Sans 3 (body) |

### Breakpoints (in responsive.css)

| Breakpoint | Width | Target |
|---|---|---|
| Desktop | > 960px | Default styles |
| Tablet | ≤ 960px | 2-column layouts |
| Mobile | ≤ 640px | Single column |
| Small Mobile | ≤ 480px | Hidden nav, hamburger menu |

---

## Credentials & Access

> ⚠️ **Never store credentials in Git.** Get these from the chapter chair.

| Service | URL | Notes |
|---|---|---|
| Live site | https://irving.acm.org | Public |
| WordPress Admin | https://irving.acm.org/wp-admin | WP credentials |
| cPanel | https://190.92.158.4:2083 | Hosting admin |
| FTP/SFTP Host | `190.92.158.4` | Port 21 (FTP) |
| FTP Username | `irvinghosting` | Same as cPanel |
| ACM Tech Support | technicalsupport@acm.org | For hosting issues |
| GitHub Repo | https://github.com/vichu/acm-irving-website | Request access from chapter chair |

---

## Troubleshooting

### Theme shows "Stylesheet is missing" in WordPress

The `style.css` file is missing or empty. Open `style.css` and make sure it starts with:

```css
/*
Theme Name: ACM Irving
...
*/
```

### SFTP upload fails with "Permission denied"

The remote folder doesn't exist. Go to cPanel File Manager and manually create:
```
public_html/wp-content/themes/acm-irving/
```

### SFTP upload fails with "Login authentication failed"

Your credentials in `sftp.json` are wrong. Double-check `username` and `password` with the chapter chair.

### Cannot access irving.hosting.acm.org

This hostname does not resolve via public DNS. Use the IP address `190.92.158.4` directly for cPanel and SFTP access.

### Local site not loading at acm-irving.local

1. Open **Local by Flywheel**
2. Make sure the `acm-irving` site shows **"Running"** status (green)
3. If stopped, click the **Start** button
4. Try flushing DNS: `sudo dscacheutil -flushcache; sudo killall -HUP mDNSResponder`

### Images not showing locally

Logo and banner images reference production URLs (`irving.acm.org/wp-content/uploads/...`). They will only show locally if you have internet access and the production server is up. This is expected behavior — images always display correctly on the live site.

### Git push fails with authentication error

GitHub no longer accepts passwords. Set up SSH authentication:
```bash
ssh-keygen -t ed25519 -C "your@email.com"
cat ~/.ssh/id_ed25519.pub
```
Copy the output and add it to **GitHub → Settings → SSH and GPG keys → New SSH key**. Then:
```bash
git remote set-url origin git@github.com:vichu/acm-irving-website.git
```

---

## Contributing

We welcome contributions from all chapter members! Before making changes, please read [CONTRIBUTING.md](CONTRIBUTING.md) which covers:

- How to create a branch and submit a Pull Request
- Branch naming conventions
- Commit message format
- What types of changes are welcome
- The review and merge process

> **The short version:** never commit to `main` directly. Always create a branch, make your changes, and open a PR on GitHub for review.

---

## Need Help?

- **Hosting issues:** Email `technicalsupport@acm.org`
- **Site/code issues:** Open an issue on [GitHub](https://github.com/vichu/acm-irving-website/issues)
- **General questions:** Contact the chapter chair