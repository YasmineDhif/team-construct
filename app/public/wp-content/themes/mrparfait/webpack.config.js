
// webpack.config.js
const path = require("path");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");
const globImporter = require("node-sass-glob-importer");

const { DefinePlugin } = require("webpack");
const dotenv = require("dotenv");
const fs = require("fs");

let BlockACF = [];

let BlockACFEntries = {};

BlockACF.forEach((name) => {
  BlockACFEntries[
    `../../blocks/${name}/public/${name}`
  ] = `./blocks/${name}/assets/${name}.ts`;
});

const entry = {
  main: "./resources/scripts/index.js",
  ...BlockACFEntries,
};

module.exports = (env, options) => {
  dotenv.config();
  const envFile = fs.readFileSync("./.env");
  const envVariables = dotenv.parse(envFile);

  const cleanedEnvVariables = Object.keys(envVariables).reduce((acc, key) => {
    acc[key] = envVariables[key].replace(/^"(.+(?="$))"$/, "$1");
    return acc;
  }, {});

  webpackRules = {
    entry,
    output: {
      path: path.resolve(__dirname, "dist"),
      filename: "scripts/[name].min.js",
      assetModuleFilename: "resources/[hash][ext][query]",
    },
    resolve: {
      extensions: [".ts", ".js", ".json"],
    },
    devtool: env.WEBPACK_WATCH ? "inline-source-map" : false,
    module: {
      rules: [
        {
          test: /\.(png|jpe?g|gif|svg|eot|ttf|woff|woff2)(\?.*$|$)/i,
          type: "asset",
        },
        {
          test: /\.(s(a|c)ss)$/,
          use: [
            MiniCssExtractPlugin.loader,
            {
              loader: "css-loader",
              options: {
                importLoaders: 1,
                esModule: false,
              },
            },
            "postcss-loader",
            {
              loader: "sass-loader",
              options: {
                sassOptions: {
                  importer: globImporter(),
                },
              },
            },
          ],
        },
        {
          test: /\.ts$/,
          exclude: "/node_modules/",
          use: [
            {
              loader: "babel-loader",
              options: {
                presets: ["@babel/preset-env"],
                plugins: [
                  "@babel/plugin-transform-modules-commonjs",
                  "add-module-exports",
                ],
              },
            },
            {
              loader: "ts-loader",
              options: {
                configFile: "tsconfig.json",
              },
            },
          ],
        },
        {
          test: /\.jsx?$/,
          exclude: "/node_modules/",
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
            plugins: [
              "@babel/plugin-transform-modules-commonjs",
              "add-module-exports",
            ],
          },
        },
      ],
    },
    optimization: {
      minimize: true,
      minimizer: [
        new CssMinimizerPlugin(),
        new TerserPlugin({
          terserOptions: {
            format: {
              comments: false,
            },
          },
          extractComments: false,
          minify: (file, sourceMap) => {
            const uglifyJsOptions = {};

            if (sourceMap) {
              uglifyJsOptions.sourceMap = {
                content: sourceMap,
              };
            }

            return require("uglify-js").minify(file, uglifyJsOptions);
          },
        }),
      ],
    },

    plugins: [
      new MiniCssExtractPlugin({ filename: "styles/[name].min.css" }),
      new DefinePlugin({
        "process.env": JSON.stringify(cleanedEnvVariables),
      }),
    ],
  };

  if (options.mode == "development") {
    webpackRules.plugins.push(
      new BrowserSyncPlugin({
        // browse to http://localhost:3000/ during development,
        // ./public directory is being served
        host: "localhost",
        port: 5000,
        proxy: process.env.LOCAL_URL,
        files: ["**/*.twig", "**/*.php"],
      })
    );
  }

  return webpackRules;
};

