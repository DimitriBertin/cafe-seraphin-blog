import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';
import svgstore from 'svgstore';
import { optimize } from 'svgo';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const sprites = svgstore();

const iconsDir = path.resolve(__dirname, 'static/icons');

fs.readdirSync(iconsDir).forEach(file => {
  if (file.endsWith('.svg')) {
    const filepath = path.join(iconsDir, file);
    const svg = fs.readFileSync(filepath, 'utf-8');
    const optimized = optimize(svg, {
      path: filepath,
    }).data;
    const name = path.basename(file, '.svg');
    sprites.add(`icon-${name}`, optimized);
  }
});

const output = path.resolve(__dirname, 'wp-content/themes/atelierdesign/public/sprite.svg');
fs.writeFileSync(output, sprites.toString({ inline: true }));
console.log('✅ Sprite SVG généré dans public/sprite.svg');