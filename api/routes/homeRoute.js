const {Router} = require('express');
const router = Router();
const homeController = require('../controllers/homeController');


router.get('/', homeController.getAll);

router.post('/', homeController.addAll);


module.exports = router;