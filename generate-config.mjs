import fs from 'fs'
import styleConfig from './style.config.mjs'
import _ from 'lodash'


function generateSassVariables(config) {
  const colorRoot = Object.entries(config.themeColors).map(([key, color]) => `  --color-${_.camelCase(key)}: ${color};` ).join('\n')
  const screenSizeRoot = Object.entries(config.screenSizes).map(([key, screenSize]) => `  --screen-size-${_.camelCase(key)}: ${screenSize};` ).join('\n')
  const fontRoot = Object.entries(config.fontFamilies).map(([key, font]) => `  --font-${_.camelCase(key)}: ${font};` ).join('\n')
  const breakpointRoot = Object.entries(config.breakpoints).map(([key, breakpoint]) => `  --breakpoint-${_.camelCase(key)}: ${breakpoint};` ).join('\n')

  const screenSizes = Object.entries(config.screenSizes).map(([key, screen]) => `  ${key}: ${screen}` ).join(',\n')
  const colors = Object.entries(config.themeColors).map(([key, color]) => `  ${key}: ${color}` ).join(',\n')
  const breakpoints = Object.entries(config.breakpoints).map(([key, breakpoint]) => `  ${key}: ${breakpoint}` ).join(',\n')
  const fonts = Object.entries(config.fontFamilies).map(([key, font]) => `  ${key}: '${font}'` ).join(',\n')

  const sassRoot = `:root {\n${colorRoot}\n${screenSizeRoot}\n${fontRoot}\n${breakpointRoot}\n}`
  const sassScreenSizes = `$screenSizes: (\n${screenSizes}\n);`
  const sassColors= `$colors: (\n${colors}\n);`
  const sassBreakpoints = `$breakpoints: (\n${breakpoints}\n);`
  const sassFont = `$fonts: (\n${fonts}\n);`


  // Container
  // sassContent += '$container-widths: (\n'
  // Object.entries(config.container.width).forEach(([key, value]) => {
  //   sassContent += `  ${key}: ${value}px,\n`
  // })
  // sassContent += ');\n\n'
  
  // sassContent += '$container-paddings: (\n'
  // Object.entries(config.container.padding).forEach(([key, value]) => {
  //   sassContent += `  ${key}: ${value}px,\n`
  // })
  // sassContent += ');\n'
  
  return `${sassRoot} \n\n${sassScreenSizes} \n\n${sassColors} \n\n${sassBreakpoints} \n\n${sassFont}`
}

// Génère le fichier
const sassVariables = generateSassVariables(styleConfig)
fs.writeFileSync('./src/styles/_config.scss', sassVariables)
console.log('Fichier Sass généré : src/styles/_config.scss')