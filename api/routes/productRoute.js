const {Router} = require('express');
const router = Router();
const ProductController = require('../controllers/productController');
const authCheck = require('../middleware/authCheck');


router.get('/:categoryName/:subcategoryName/:productId', authCheck, ProductController.getProduct);

module.exports = router;