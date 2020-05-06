const {Router} = require('express');
const router = Router;
const authController = require('../controllers/authController');

router.get('auth/signin', authController.signin);
router.get('auth/signout', authController.signout);
router.get('auth/signup', authController.signup);
