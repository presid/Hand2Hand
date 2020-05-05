const {Router} = require('express');
const router = Router();
const SubcategoryController = require('../controllers/subcategoryController');

router.get('/:categoryName/:subcategoryName', SubcategoryController.getSubcategory);

module.exports = router;