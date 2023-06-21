const path = require("path");
const glob = require("glob");
const fs = require('fs');

function getEntries (){
  return fs.readdirSync('./js/')
      .filter(
          (file) => file.match(/.*\.js$/)
      )
      .map((file) => {
        return {
          name: file.substring(0, file.length - 3),
          path: './js/' + file
        }
      }).reduce((memo, file) => {
        memo[file.name] = file.path
        return memo;
      }, {})
}

module.exports = {
  mode: "production",
  entry: getEntries(),
  devtool: false,
  output: {
    filename: "[name].min.js",
    path: path.resolve(__dirname, "dist/js"),
    clean: true,
  }
};
