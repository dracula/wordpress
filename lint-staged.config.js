module.exports = {
  "resources/**/*.{css,js}": ["prettier --write"],
  "**/*.php": ["php .vendor/bin/phpcbf --extensions=php --standard=WordPress"],
};
