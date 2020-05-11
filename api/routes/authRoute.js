const {Router} = require('express');
const router = Router();
const authController = require('../controllers/authController');
// const redirect = require('../middleware/redirect');

router.get('/signin', authController.signIn);
router.post('/signin', authController.signInUser);
router.get('/logOut', authController.logOut);

router.get('/signup', authController.signUp);
router.post('/signup', authController.signUpUser);

module.exports = router;