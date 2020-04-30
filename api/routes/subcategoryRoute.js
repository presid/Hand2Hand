const {Router} = require('express');
const router = Router();
const SubcategoryController = require('../controllers/subcategoryController');
const urlCheck = require('../middleware/url_check');

router.get('/:categoryName/:subcategoryName', SubcategoryController.getSubcategory);

module.exports = router;