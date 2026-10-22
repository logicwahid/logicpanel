<div align="center">
  <h1>LogicPanel</h1>
  <p><b>Lightweight, Fast & Docker-Isolated Web Hosting Control Panel.</b></p>
  <p>
    <a href="https://github.com/logicwahid/logicpanel/releases"><img src="https://img.shields.io/github/v/release/logicwahid/logicpanel?color=blue" alt="Latest Release" /></a>
    <img src="https://img.shields.io/badge/Version-3.2.0-blue.svg" alt="Version 3.2.0" />
    <img src="https://img.shields.io/badge/Docker-Isolated-2496ED.svg" alt="Docker Powered" />
    <img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License MIT" />
  </p>
</div>

---

**LogicPanel** is a modern, lightweight web hosting control panel built for developers, agencies, and hosting providers. It allows anyone — even with zero Linux experience — to host **Node.js**, **Python**, **N8n**, static websites, and databases with automated SSL and 100% Docker isolation.

<img width="1366" height="644" alt="LogicPanel Dashboard" src="https://github.com/user-attachments/assets/cd3a464b-70bb-4bde-9779-d18ac33dec4f" />

---

## ⚡ 1-Minute Automated Installation

You don't need to configure web servers, databases, or firewalls manually. Everything is set up automatically with one single command.

### Requirements:
* A fresh Linux VPS (**Ubuntu 22.04 / 24.04** or **Debian 11 / 12** recommended).
* Minimum **1 GB RAM** (2 GB recommended).
* Root or sudo access.

### Run Installer:
Connect to your VPS via SSH and run:

```bash
curl -sSL https://raw.githubusercontent.com/logicwahid/logicpanel/main/install.sh | sudo bash
```

> **What happens next?**
> The installer automatically detects your OS, installs Docker, configures the Traefik SSL reverse proxy, secures your ports, generates random secure credentials, and displays your login information directly on your screen.

---

## 🔑 Accessing Your Panels

Once installation finishes, your panel is immediately live:

| Panel | URL | Purpose |
| :--- | :--- | :--- |
| **Master Admin Panel** | `https://YOUR_SERVER_IP:9999` | Server management, API keys, user accounts, and updates. |
| **User Client Dashboard** | `https://YOUR_SERVER_IP:7777` | App deployments, databases, file manager, and SSL. |

*(Replace `YOUR_SERVER_IP` with your actual server IP address)*

---

## ✨ What You Can Do

* **🚀 1-Click App Deployments**: Host Node.js (18/20/22+), Python (Flask/Django/FastAPI), N8n workflows, or static sites in seconds.
* **🗄️ Instant Databases**: Spin up MySQL, PostgreSQL, Redis, and MongoDB with one click.
* **🔒 Automatic Free SSL**: Let's Encrypt SSL certificates are requested and renewed automatically for all your domains.
* **💻 In-Browser Web Terminal & File Manager**: Edit code, upload zip files, and access your app's shell directly from your browser.
* **🛡️ 100% Docker Container Isolation**: Every app runs in its own sandbox — if one site breaks, no other site on your server is affected.
* **💼 Billing Integration Ready**: Fully automated provisioning module for **Blesta** and **WHMCS** included.

---

## 🛠️ Quick Management Commands

All simple maintenance tasks can be done with one line:

### Update LogicPanel to Latest Version
```bash
cd /opt/logicpanel && sudo ./update.sh
```

### Restart Panel Services
```bash
cd /opt/logicpanel && sudo docker compose restart
```

### View Live System Logs
```bash
cd /opt/logicpanel && sudo docker compose logs -f
```

### Complete Uninstallation (Clean VPS)
```bash
curl -sSL https://raw.githubusercontent.com/logicwahid/logicpanel/main/uninstall.sh | sudo bash
```

---

## 🤝 Community & Support

* **Documentation**: [docs & setup guides](https://github.com/logicwahid/logicpanel#readme)
* **GitHub Repository**: [github.com/logicwahid/logicpanel](https://github.com/logicwahid/logicpanel)
* **Report an Issue**: [github.com/logicwahid/logicpanel/issues](https://github.com/logicwahid/logicpanel/issues)
* **Author**: [@logicwahid](https://github.com/logicwahid)

---

## 📄 License

LogicPanel is open-source software licensed under the **[MIT License](LICENSE)**.
