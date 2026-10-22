# Git Dual Push Rule for HostCreed

Whenever any code edit, feature addition, bug fix, or modification is performed in this workspace:
1. Always stage and commit the changes:
   - `git add .`
   - `git commit -m "concise description of changes"`
2. Always deploy/push to both remotes:
   - Live Server: `git push live main` (deploys automatically to `/home/fptqqeim/public_html`)
   - GitHub: `git push origin main` (keeps backup and version control synced)
3. Ensure sensitive files (such as `configuration.php`, logs, or caches) are never pushed.
