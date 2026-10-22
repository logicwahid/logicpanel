# Kill AI Slop Rule

All agents must strictly follow the Kill AI Slop skill procedures in `.agents/skills/kill-ai-slop/SKILL.md`.

## Principles:
1. **Decide before you decorate:** Every visual element must be explainable.
2. **One accent, one voice:** Never use multi-hue rainbow tags, purple/indigo gradients, or gradient-clipped headlines.
3. **No Slop Visual Tics:**
   - No glowing status dots, wobbly spinners, or atmospheric radial glow circles.
   - No glassmorphism (`backdrop-filter: blur`) unless deliberately chosen for a modal overlay.
   - No oversized floating shadows or over-rounded cards.
4. **No Slop Copywriting:**
   - Avoid "Not just X — it's Y", "Empower", "Unleash", "Elevate".
   - No emoji spam in headings and bullet points.
5. **Verification:**
   - Run `node .agents/skills/kill-ai-slop/scripts/scan.mjs <target-dir>` to ensure no new slop is introduced.
