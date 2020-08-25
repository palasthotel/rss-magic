const path = require('path');

module.exports = {
    entry: {
        menuPage: path.resolve(__dirname, './src/scripts/menu-page.js'),
    },
    output: {
        path: path.resolve(__dirname)+'/public/dist/scripts/.',
        filename: '[name].js',
        sourceMapFilename: '[name].map',
    },
    devtool: 'source-map',
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules|bower_components/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [
                            "@babel/preset-env",
                            "@babel/preset-react",
                        ],
                    }
                },
            }
        ]
    },
    externals : {
        react: 'React',
        'react-dom': 'ReactDOM',
    },
};
