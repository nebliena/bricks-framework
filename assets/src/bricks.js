requirejs = require('requirejs').requirejs();
requirejs.config({ "baseUrl": "assets/src" });
requirejs.config({ "paths": { "some-module": "blocks/block" } });

let bricks = requirejs('block');

//let block_1 = new bricks.Bricksblock('bricks-f/text', 'bricks-f', 'Text', 'edit', 'text');