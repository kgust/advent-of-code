const path = require('path');
const LiveReloadPlugin = require('webpack-livereload-plugin');

module.exports = {
    context: '/Users/gustavkd/PhpStormProjects/advent-of-code',
    entry: {
        day15: './Day 15/'
    },
    mode: 'development',
    output: {
        filename: '[name].js',
        path: path.resolve(__dirname, 'dist')
    },
    module: {
        rules: [
            { test: /\.txt$/, use: 'raw-loader' }
        ]
    },
    plugins: [ new LiveReloadPlugin() ],
    watch: false,
    watchOptions: {
        ignored: ['node_modules']
    }
};

/**
{
    context: '/Users/gustavkd/PhpstormProjects/irb',
    entry:
        {
            'bootstrap-notify.bundle': './web/assets/modules/notify',
            backbone: './web/assets/modules/backbone/',
            'global.bundle': './web/assets/css/global.scss'
        },
    output:
        {
            path: '/Users/gustavkd/PhpstormProjects/irb/web/assets/build',
            filename: '[name].js',
            publicPath: '/build/',
            pathinfo: true
        },
    module:
        {rules: [[Object], [Object], [Object], [Object], [Object]]},
    plugins:
        [ExtractTextPlugin {filename: '[name].css', id: 1, options: [Object]},
            DeleteUnusedEntriesJSPlugin {entriesToDelete: [Array]},
            ManifestPlugin {opts: [Object]},
            LoaderOptionsPlugin {options: [Object]},
            NamedModulesPlugin {options: {}},
            ProvidePlugin {definitions: [Object]},
            CleanWebpackPlugin {paths: [Array], options: [Object]},
            DefinePlugin {definitions: [Object]},
            {
                options: [Object],
                lastBuildSucceeded: false,
                isFirstBuild: true
            },
            FriendlyErrorsWebpackPlugin {
            compilationSuccessInfo: [Object],
            onErrors: undefined,
            shouldClearConsole: false,
            formatters: [Array],
            transformers: [Array]
        },
            AssetOutputDisplayPlugin {
            outputPath: 'web/assets/build',
            friendlyErrorsPlugin: [FriendlyErrorsWebpackPlugin]
        }],
    devtool: 'inline-source-map',
    performance: {hints: false},
    stats:
        {
            hash: false,
            version: false,
            timings: false,
            assets: false,
            chunks: false,
            maxModules: 0,
            modules: false,
            reasons: false,
            children: false,
            source: false,
            errors: false,
            errorDetails: false,
            warnings: false,
            publicPath: false
        },
    resolve:
        {
            extensions: ['.js', '.jsx', '.vue', '.ts', '.tsx'],
            alias: {}
        }
};
 */
