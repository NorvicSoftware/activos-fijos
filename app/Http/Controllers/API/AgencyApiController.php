<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use App\Repositories\AgencyRepositoryInterface;

class AgencyApiController extends Controller
{
    private $agencyRepository;

    public function __construct(AgencyRepositoryInterface $agencyRepository)
    {
        $this->agencyRepository = $agencyRepository;
    }

    // Index: List all agencies
    public function index()
    {
        $agencies = $this->agencyRepository->getAll();
        return response()->json($agencies);
    }

    // Show: Display a specific agency
    public function show($id)
    {
        $agency = $this->agencyRepository->findById($id);
        if (!$agency) {
            return response()->json(['error' => 'Agency not found'], 404);
        }
        return response()->json($agency);
    }

    // Create: Store a new agency
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        $agency = $this->agencyRepository->create($data);
        return response()->json($agency, 201);
    }

    // Edit: Update an existing agency
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        $agency = $this->agencyRepository->update($id, $data);
        if (!$agency) {
            return response()->json(['error' => 'Agency not found'], 404);
        }
        return response()->json($agency);
    }

    // Destroy: Delete an agency
    public function destroy($id)
    {
        if (!$this->agencyRepository->deleteById($id)) {
            return response()->json(['error' => 'Agency not found'], 404);
        }
        return response()->json(null, 204); // No content to return
    }
}
