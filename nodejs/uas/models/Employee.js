// import database
const db = require("../config/database");

// membuat class Employee
class Employee {
  // buat fungsi
  // menghubungkan database
  static all() {
    return new Promise((resolve, reject) => {
      // query untuk ambil data dari database
      const sql = "SELECT * from employees";
      db.query(sql, (sql, results) => {
        resolve(results);
      });
    });
  }

  // fungsi untuk insert data
  static async create(Employee) {
    // method yang menerima data inputan
    const id = await new Promise((resolve, reject) => {
      const sql = "INSERT INTO employees SET ?";
      db.query(sql, Employee, (err, results) => {
        resolve(results.insertId);
      });
    });

    // method yang mengembalikan nilai inputan
    return new Promise((resolve, reject) => {
      const sql = `SELECT * FROM employees WHERE id = ?`;
      db.query(sql, id, (err, results) => {
        resolve(results);
      });
    });
  }

  // find id
  static find(id) {
    return new Promise((resolve, reject) => {
      const sql = `SELECT * FROM employees WHERE id = ?`;
      db.query(sql, id, (err, results) => {
        resolve(results);
      });
    });
  }

  // update data
  static async update(id, data) {
    await new Promise((resolve, reject) => {
      const sql = "UPDATE employees SET ? WHERE id = ?";
      db.query(sql, [data, id], (err, results) => {
        resolve(results);
      });
    });
    // find by id
    const employees = await this.find(id);
    return employees;
  }

  // delete data
  static async delete(id) {
    return new Promise((resolve, reject) => {
      const sql = "DELETE FROM employees WHERE id = ?";
      db.query(sql, id, (err, results) => {
        resolve(results);
      });
    });
  }

  // find name
  static find(name) {
    return new Promise((resolve, reject) => {
      const sql = `SELECT * FROM employees WHERE name = ?`;
      db.query(sql, name, (err, results) => {
        resolve(results);
      });
    });
  }

  // find inactive status
  static findInactive(inactive) {
    return new Promise((resolve, reject) => {
      const sql = `SELECT * FROM employees WHERE status = "0"`;
      db.query(sql, [inactive], (err, results) => {
        resolve(results);
      });
    });
  }
  // find active status
  static findActive(active) {
    return new Promise((resolve, reject) => {
      const sql = `SELECT * FROM employees WHERE status = "1"`;
      db.query(sql, [active], (err, results) => {
        resolve(results);
      });
    });
  }

  // find terminated status
  static findTerminated(terminated) {
    return new Promise((resolve, reject) => {
      const sql = `SELECT * FROM employees WHERE status = "2"`;
      db.query(sql, [terminated], (err, results) => {
        resolve(results);
      });
    });
  }
}

// export class Employee
module.exports = Employee;
