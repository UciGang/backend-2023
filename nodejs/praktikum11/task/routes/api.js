// Import Student Controller
const StudentController = require("../controllers/StudentController");

// import expres
const express = require("express");

// buat objek router
const router = express.Router();

router.get("/", (req, res) => {
  res.send("Hello Rifky");
});

router.get("/students", StudentController.index);
router.post("/students", StudentController.store);
router.put("/students/:id", StudentController.update);
router.delete("/students/:id", StudentController.destroy);

// Export router
module.exports = router;
