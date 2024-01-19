// import Model Employee
const { validationResult } = require("express-validator");
const Employee = require("../models/Employee");

// buat class EmployeeController
class EmployeeController {
  // buat fungsi
  // get all
  async index(req, res) {
    const employees = await Employee.all();

    if (employees.length === 0) {
      // tidak ada data yang ditemukan
      const data = {
        message: "Data is empty",
        data: [],
      };
      res.status(200).json(data);
    } else {
      // data ditemukan
      const data = {
        message: "Get All Resource",
        data: employees,
      };
      res.status(200).json(data);
    }
  }

  // insert data
  async store(req, res) {
    const { name, gender, phone, address, email, status, hired_on } = req.body;

    // buat object validator
    const { body, validationResult } = require("express-validator");

    // validasi untuk setiap field
    await Promise.all([
      body("name").notEmpty().withMessage("Name is required").run(req),
      body("gender").notEmpty().withMessage("Gender is required").run(req),
      body("phone").notEmpty().withMessage("Phone is required").run(req),
      body("address").notEmpty().withMessage("Address is required").run(req),
      body("email").isEmail().withMessage("Invalid email format").run(req),
      body("status").notEmpty().withMessage("Status is required").run(req),
      body("hired_on")
        .notEmpty()
        .withMessage("Hired date is required")
        .run(req),
    ]);

    // jalankan validasi
    const errors = validationResult(req);
    if (!errors.isEmpty()) {
      return res.status(422).json({
        message: "All fields must be filled correctly",
        errors: errors.array(),
      });
    }

    // jika tidak ada error, lanjutkan proses
    const employees = await Employee.create(req.body);

    const data = {
      message: "Resource is added Successfully",
      data: employees,
    };

    res.status(201).json(data);
  }

  // update data
  async update(req, res) {
    const { id } = req.params;
    const employees = await Employee.find(id);

    if (employees) {
      const employeeUpdated = await Employee.update(id, req.body);
      const data = {
        message: "Resource is updated successfully",
        data: employeeUpdated,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Resource not found",
      };
      res.status(404).json(data);
    }
  }

  // delete data
  async destroy(req, res) {
    const { id } = req.params;
    const employees = await Employee.find(id);

    if (employees) {
      await Employee.delete(id);
      const data = {
        message: "Resource is delete successfully",
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Resource not found",
      };
      res.status(404).json(data);
    }
  }

  // find by id
  async show(req, res) {
    const { id } = req.params;
    const employees = await Employee.find(id);

    if (employees) {
      const data = {
        message: "Get Detail Resource",
        data: employees,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Resource not found",
      };
      res.status(404).json(data);
    }
  }

  // find by name
  async search(req, res) {
    const { name } = req.params;
    const employees = await Employee.find(name);

    if (employees) {
      const data = {
        message: "Get Detail Resource",
        data: employees,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Resource not found",
      };
      res.status(404).json(data);
    }
  }

  // find active
  async active(req, res) {
    const { status } = req.params;
    const employees = await Employee.findActive(status);

    if (employees) {
      const data = {
        message: "Get Detail Resource",
        data: employees,
        total: employees,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Resource not found",
      };
      res.status(404).json(data);
    }
  }

  // find inactive
  async inactive(req, res) {
    const { status } = req.params;
    const employees = await Employee.findInactive(status);

    if (employees) {
      const data = {
        message: "Get Detail Resource",
        data: employees,
        total: employees,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Resource not found",
      };
      res.status(404).json(data);
    }
  }

  // find terminated
  async terminated(req, res) {
    const { status } = req.params;
    const employees = await Employee.findTerminated(status);

    if (employees) {
      const data = {
        message: "Get Detail Resource",
        data: employees,
        total: employees,
      };
      res.status(200).json(data);
    } else {
      const data = {
        message: "Resource not found",
      };
      res.status(404).json(data);
    }
  }
}

// membuat object EmployeeController
const object = new EmployeeController();

// export object EmployeeController
module.exports = object;
