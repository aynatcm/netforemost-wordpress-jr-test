const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
    watch: true,
    entry: {
        styles: ["../theme-aynat/assets/sass/styles.scss", "../theme-aynat/assets/js/main.js"],
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "[name].css",
        }),
    ],

    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
            },
        ],
    },
};
