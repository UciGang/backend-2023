// import EmployeeController
const EmployeeController = require("../controllers/EmployeeController");

// import express
const express = require("express");

// membuat object router
const router = express.Router();

/**
 * Membuat routing
 */
router.get("/", (req, res) => {
  res.send("Hello HRD API Express");
});

// Membuat routing employee
router.get("/employees", EmployeeController.index); // get all
router.post("/employees", EmployeeController.store); // create
router.put("/employees/:id", EmployeeController.update); // update
router.delete("/employees/:id", EmployeeController.destroy); // delete
router.get("/employees/:id", EmployeeController.show); // find one resource
router.get("/employees/search/:name", EmployeeController.search); // search by name
router.get("/employees/status/active", EmployeeController.active); // get active resource
router.get("/employees/status/inactive", EmployeeController.inactive); // get inactive resource
router.get("/employees/status/terminated", EmployeeController.terminated); // get terminated resource

// export router
module.exports = router;
