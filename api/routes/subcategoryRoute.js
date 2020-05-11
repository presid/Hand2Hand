const {Router} = require('express');
const router = Router();
const SubcategoryController = require('../controllers/subcategoryController');
const authCheck = require('../middleware/authCheck');


router.get('/:categoryName/:subcategoryName', authCheck, SubcategoryController.getSubcategory);

module.exports = router;